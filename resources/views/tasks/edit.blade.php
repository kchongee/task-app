<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>                        
                        <form method="post" action="{{ route('tasks.update', $task->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')                 
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus value="{{ $task->title }}"/>
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                    
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-area id="description" name="description" class="mt-1 block w-full " required value="{{ $task->description }}"/>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />                                                                       
                            </div>
                            
                            {{-- <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">                                                                        
                                    <input id="isCompleted" aria-describedby="isCompleted" type="hidden" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded" />
                                    <input type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded" name="isCompleted" checked= value={{ $task->is_completed}}/>
                                    <label for="isCompleted" class="font-medium text-gray-700 dark:text-gray-300">Is completed?</label>                                    
                                </div>                                
                                <div class="text-sm ml-3">                                    
                                </div>
                            </div>                             --}}

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>                    
                        </form>
                    </section>                    
                </div>
            </div>            
        </div>
    </div>
</x-app-layout>
