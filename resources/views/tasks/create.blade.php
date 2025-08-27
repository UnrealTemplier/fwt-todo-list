<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="content" :value="__('Task\'s content')"/>
                        <x-text-input id="content" name="content" class="block mt-1 w-full" :value="old('content')" required autofocus/>
                        <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                    </div>

                    <x-primary-button class="mt-4">
                        {{ __('Save') }}
                    </x-primary-button>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
