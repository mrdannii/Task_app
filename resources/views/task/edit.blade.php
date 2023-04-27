<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('View / Edit Task') }}
                </div>


                <form method="post" action="{{ route('task.update', $task->id) }}" class=" space-y-6" enctype="multipart/form-data">
                    @csrf
@method('PATCH')
                    <div class="ml-10 mr-10">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autofocus
                            autocomplete="T" value="{{ $task->title }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="ml-10 mr-10">
                        <x-input-label for="Description" :value="__('Description')" />
                        <x-textarea name="description" id="description" value="{{ $task->description }}" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>


                    <div class="flex items-center gap-4 justify-center p-5">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>

                        @if (session('status'))
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"> {{ session('status') }}
                            </p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
