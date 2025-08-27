@props(['tasks'])

<div>
    <ul>
        @foreach ($tasks as $task)
            <x-task :task="$task"/>
        @endforeach
    </ul>
</div>
