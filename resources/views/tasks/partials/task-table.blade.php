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
                @csrf
                @method('put')                                                
                <input type="hidden" value="{{ 1 }}" name="isCompleteButton"/>
                <x-success-button>Complete</x-success-button>
            </form>
            <form method="post" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('put')                                                
                <input type="hidden" value="{{ 1 }}" name="isIncompleteButton"/>                                                
                <x-warning-button>Incomplete</x-warning-button>
            </form>                                            
            <form method="post" action="{{ route('tasks.destroy', $task->id) }}">                                                
                @csrf
                @method('delete')
                <x-danger-button>Delete</x-danger-button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>