@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl md:text-3xl font-extrabold mb-10 flex items-center gap-2 dark:text-gray-100">
        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Bienvenido, {{ Auth::user()->name }}
    </h1>
    <p class="mb-6 text-gray-600 md:mb-10 text-center max-w-2xl mx-auto dark:text-gray-100">
        Aquí puedes ver un resumen de tus tareas. <br>¡Sigue avanzando y mantén tu productividad al máximo!
    </p>
    <hr class="mb-6 md:mb-12 dark:text-gray-100">
    <section class="flex flex-col gap-6 md:flex-row md:gap-8 justify-center items-center">
        <div class="flex justify-center flex-col items-center w-full max-w-xs h-44 aspect-square rounded-2xl shadow-lg bg-gradient-to-b from-amber-300 to-amber-500 mb-4 md:mb-0 gap-4   dark:from-amber-500 dark:to-amber-700">
            <h2 class="text-lg md:text-2xl text-white font-semibold flex items-center gap-2">
                <img class="w-6 h-6 text-white" src="{{ asset('icons/pending.svg')}}" />
                Tareas pendientes
            </h2>
            <p class="text-3xl md:text-4xl text-white font-bold">{{$infoTasks->pending}}</p>
        </div>

        <div class="flex justify-center flex-col items-center w-full max-w-xs h-44 aspect-square rounded-2xl shadow-lg bg-gradient-to-b from-green-300 to-green-500 mb-4 md:mb-0 gap-4  dark:from-green-500 dark:to-green-700">
            <h2 class="text-lg md:text-2xl text-white font-semibold flex items-center gap-2">
                <img class="w-6 h-6 text-white" src="{{ asset('icons/check.svg')}}" />
                Tareas Completas
            </h2>
            <p class="text-3xl md:text-4xl text-white font-bold">{{$infoTasks->completed}}</p>
        </div>
                <div class="flex justify-center flex-col items-center w-full max-w-xs h-44 aspect-square rounded-2xl shadow-lg bg-gradient-to-b from-red-300 to-red-500 gap-4  dark:from-red-400 dark:to-red-800">
            <h2 class="text-lg md:text-2xl text-white font-semibold flex items-center gap-2">
                <img class="w-6 h-6 text-white" src="{{ asset('icons/lists.svg')}}">
                </img>
                Tareas Atrasadas
            </h2>
            <p class="text-3xl md:text-4xl text-white font-bold">{{$infoTasks->overdue}}</p>
        </div>
        <div class="flex justify-center flex-col items-center w-full max-w-xs h-44 aspect-square rounded-2xl shadow-lg bg-gradient-to-b from-blue-300 to-blue-500 gap-4  dark:from-blue-500 dark:to-cyan-800">
            <h2 class="text-lg md:text-2xl text-white font-semibold flex items-center gap-2">
                <img class="w-6 h-6 text-white" src="{{ asset('icons/lists.svg')}}">
                </img>
                Tareas totales
            </h2>
            <p class="text-3xl md:text-4xl text-white font-bold">{{$infoTasks->total}}</p>
        </div>

    </section>
    <div class="mt-10 flex flex-col items-center hover:scale-105 transition-transform">
        <a href="{{route('tasks')}}" class="inline-flex items-center px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition-colors font-semibold text-lg">
            Ver todas las tareas
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>
    @livewire('task-upcoming')
    @include('components.made')
@endsection