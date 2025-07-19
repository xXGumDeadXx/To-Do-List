@extends('layouts.homeLayouts')

@section('content')
    <div class="text-grey-800 dark:text-gray-100 text-center mb-8 w-sm flex flex-col items-center">
        @include('svg.logo')
        <h1 class="text-3xl font-bold mb-2">¡Bienvenido a tu lista de tareas!</h1>
        <p class="text-lg mb-2">Organiza, prioriza y cumple tus objetivos diarios de manera sencilla.</p>
        <p class="text-base text-gray-800 dark:text-gray-400">Comienza agregando tus tareas y mantén el control de tu productividad.</p>
    </div>
    @livewire('auth-form')
@endsection