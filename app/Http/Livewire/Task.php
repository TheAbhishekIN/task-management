<?php

namespace App\Http\Livewire;

use App\Models\Project;
use LivewireUI\Modal\ModalComponent;
use App\Models\Task as TaskModel;

class Task extends ModalComponent
{
    public $task_name = '';
    public $project_name = '';
    public $projects;
    public $type;
    public $task_id;
    protected $rules = [
        'task_name' => 'required|min:6',
        'project_name' => 'required'
    ];

    public function mount($type, $id = null){
        $this->type = $type;
        if($id !== null && $type == 'update' || $type == 'delete'){
            $this->task_id = $id;
            $task = TaskModel::find($id);
            $this->project_name = $task->project;
            $this->task_name = $task->task_name;
        }
        $this->projects = Project::all();
    }

    public function updated($task_name)
    {
        $this->validateOnly($task_name);
    }
    public function render()
    {
        return view('livewire.task');
    }

    public function saveTask(){
         $validatedData = $this->validate();
         if($this->type == 'create'){
                  TaskModel::create([
                    'task_name' => $this->task_name,
                    'project' => $this->project_name,
                    'priority' => TaskModel::all()->count()+1
                ]);
         }else if($this->type == 'update'){
             TaskModel::where('id',$this->task_id)->update([
                    'task_name' => $this->task_name,
                    'project' => $this->project_name
                ]);
         }
        return redirect()->route('task');
    }

    public function deleteTask(){
        if($this->type == 'delete'){
           TaskModel::destroy($this->task_id);
         }

        $tasks = TaskModel::all();
        $count = 1;
        foreach($tasks as $task){
            $task->priority = $count;
            $task->save();
            $count++;
        }
        return redirect()->route('task');
    }

    public function updateTaskPriority(){
        dd('data');
    }
}
