@extends('layouts.dashboard')

@section('title', 'Tareas')


@section('content')
     <h1 class="text-2xl md:text-3xl font-extrabold mb-10 flex items-center gap-2 dark:text-white text-gray-900">
        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Tareas
    </h1>
    <p class="mb-6 text-gray-600 md:mb-10 text-center max-w-2xl mx-auto dark:text-gray-100">
        Aqui puedes ver todas tus tareas, y crear unas nuevas!
    </p>
    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif
    <hr class="mb-6 md:mb-12 dark:border-gray-300 border-gray-600">
    {{-- Seccion de crear una nueva tarea --}}
    <div class=" mb-6">

        @livewire('create-task')
    </div>
    {{-- Seccion de mostrar las tareas --}}
    <section aria-labelledby="tareas-heading">
        @livewire('task-filters')
        @livewire('task-counter')
        @livewire('tasks')
    </section>

@endsection