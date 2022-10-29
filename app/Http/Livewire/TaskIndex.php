<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class TaskIndex extends Component
{
    public $tasks;
    public $projects;
    public $selected_project = '';

    public function mount(){
        $this->projects = \App\Models\Project::all();
    }
    public function render()
    {
        $tasks = \App\Models\Task::orderBy('priority');
        if($this->selected_project != ''){
            $tasks = $tasks->where('project',$this->selected_project);
        }
        $this->tasks = $tasks->get();

        return view('livewire.task-index');
    }

    public function updateTaskPriority($list){
        foreach($list as $item){
            \App\Models\Task::find($item['value'])->update(['priority' => $item['order']]);
        }
    }
}
