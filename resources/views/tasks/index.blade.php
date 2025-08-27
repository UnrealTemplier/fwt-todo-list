<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="mt-8 ml-8">
                    <a href="{{ route('tasks.create') }}">
                        <x-primary-button>+Add task</x-primary-button>
                    </a>
                </div>

                <div class="p-6 text-gray-900">
                    <x-task-list :tasks="$tasks"/>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
