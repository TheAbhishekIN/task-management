<div>
     <div class="bg-white border-t border-l border-r rounded-5 ">
                    <div class="p-4">
                        <div class="bg-white rounded-5 ">
                            <x-primary-button onclick="Livewire.emit('openModal', 'task', {{ json_encode(['create']) }})">Add Task</x-primary-button>

                            <select wire:model="selected_project" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Filter by Project</option>
                                @forelse($projects as $project)
                                <option value="{{$project->name}}">{{$project->name}}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                          <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                  <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                      <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                          Task Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                          Project Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                          Priority
                                        </th>
                                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                          Created On
                                        </th>
                                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                          Action
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody wire:sortable="updateTaskPriority">
                                    @forelse($tasks as $task)
                                      <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100" wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" wire:sortable.handle>
                                          {{$task->task_name}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                         {{$task->project}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                          {{$task->priority}}
                                        </td>
                                          <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" >
                                          {{$task->created_at}}
                                        </td>
                                          <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                          <x-secondary-button onclick="Livewire.emit('openModal', 'task', {{ json_encode(['update', $task->id]) }})">Edit Task</x-secondary-button>
                                              <x-danger-button onclick="Livewire.emit('openModal', 'task', {{ json_encode(['delete', $task->id]) }})">Delete</x-danger-button>
                                        </td>
                                      </tr>
                                    @empty
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <th>
                                            No Tasks available!
                                        </th>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                            </div>
                        </div>
</div>
