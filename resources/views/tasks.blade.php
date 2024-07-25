<x-app-layout>
    <x-slot:title>
        Custom Title from task blade
    </x-slot>
    @foreach ($tasks as $task)
    <h3 class="text-white">{{ $task->id }}</h3><h3 class="text-white">{{ $task->title }}</h3>
    <h4 class="text-white">{{ $task->content }}</h4>
    @endforeach
</x-app-layout>