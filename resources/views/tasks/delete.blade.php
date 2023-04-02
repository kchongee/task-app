<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">                            
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <form method="get" action="{{ route('tasks.create') }}" class="mb-6">
                                    <x-primary-button>{{__('Add')}}</x-primary-button>
                                </form>
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                        {{-- <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th> --}}
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $task->title }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $task->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-1">
                                            <form method="post" action="{{ route('tasks.update', $task->id) }}">
                                                @method('put')                                                
                                                <input type="hidden" value="{{ 1 }}" name="isCompleteButton"/>
                                                <x-success-button>Complete</x-success-button>
                                            </form>
                                            <form method="get" action="{{ route('tasks.edit', $task->id) }}">                                                                                                                                 
                                                <x-warning-button>Edit</x-warning-button>
                                            </form>
                                            <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                                                @method('delete')
                                                @csrf
                                                <x-danger-button>Delete</x-danger-button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                </div>
                                <div class="mt-4">
                                {{ $tasks->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>