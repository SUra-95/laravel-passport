<x-app>
    <x-slot:title>
        Custom Title from task blade
    </x-slot>
    @foreach ($tasks as $task)
    <h3>{{ $task->id }}</h3><h3>{{ $task->title }}</h3>
    <h4>{{ $task->content }}</h4>
    @endforeach
</x-app>