<div>
    <div class="p-4 w-full bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8">
        @if($type == 'delete')
             <h5 class="text-xl font-medium text-gray-900">Are you sure you want to delete this task?</h5>
             <button wire:click.prevent="deleteTask" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete Task</button>
        @else
    <form class="space-y-6" wire:submit.prevent="saveTask">
        <h5 class="text-xl font-medium text-gray-900">Add Task</h5>
        <div>
            <label for="task" class="block mb-2 text-sm font-medium text-gray-900 ">Task Name</label>
            <input type="text" wire:model="task_name" id="task" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            @error('task_name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Select Project</label>
            <select wire:model="project_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">Select Project</option>
                @forelse($projects as $project)
                <option value="{{$project->name}}" @if($project_name == $project->name) selected @endif>{{$project->name}}</option>
                @empty
                @endforelse
            </select>
        </div>

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Task</button>
    </form>
            @endif
</div>
</div>
