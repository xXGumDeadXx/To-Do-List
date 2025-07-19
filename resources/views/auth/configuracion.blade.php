@extends('layouts.dashboard')
@section('title', 'Configuración')

@section('content')
    <h1 class="text-2xl md:text-3xl font-extrabold mb-10 flex items-center gap-2 dark:text-gray-100">
        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Configuración
    </h1>
    @livewire('profile-or-other')
@endsection