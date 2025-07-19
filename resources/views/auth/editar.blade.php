@extends('layouts.dashboard')
@section('title', 'Editar tarea')

@section('content')
    <h1 class="text-2xl md:text-3xl font-extrabold mb-10 flex items-center gap-2 text-gray-900 dark:text-gray-100" >
        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Editar Tareas
    </h1>
    <p class="mb-6 text-gray-600 md:mb-10 text-center max-w-2xl mx-auto dark:text-gray-300">
        Parece que has encontrado una tarea que quieres editar. Aquí puedes modificar los detalles de la tarea seleccionada!
    </p>
    <a 
        href="{{ route('tasks') }}" 
        class="inline-block mb-6 px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-800"
    >
        ← Regresar
    </a>
    <section>
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <form action="{{ route('tasks.update', ['id' => $infoTask->id]) }}" method="POST" class="space-y-6">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Título*</label>
                    <input
                        type="text"
                        id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-3 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-100"
                        placeholder="Descripción breve de la tarea"
                        value="{{$infoTask->title}}"
                        name="title"
                        required
                    >
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripción</label>
                    <textarea
                        id="description"
                        rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-3 max-h-34 min-h-13 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-100"
                        placeholder="Detalles adicionales (opcional)"
                        name="description"
                    >{{$infoTask->description}}</textarea>
                    @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div class="mb-4">
                    <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fecha Límite</label>
                    <input
                        type="date"
                        id="due_date"
                        min="{{ now()->format('Y-m-d') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 p-3 md:max-w-min dark:bg-gray-900 dark:border-gray-600 dark:text-gray-100"
                        value="{{$infoTask->due_date}}"
                        name="due_date"
                        required
                    >
                    @error('due_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <h3 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Estado de la tarea</h3>
                <div class="flex mx-4 gap-7 mb-6 flex-col md:flex-row md:items-center">
                    <article class="flex flex-row gap-2">
                        <label for="completed" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            <input
                                type="radio"
                                name="status"
                                value="completed"
                                {{ $infoTask->completed ? 'checked' : '' }}
                                class="dark:bg-gray-900 dark:border-gray-600"
                            />
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200">Completada</span>
                        </label>
                    </article>
                    <article class="flex flex-row gap-2 ">
                        <input
                            type="radio"
                            name="status"
                            value="pending"
                            {{ !$infoTask->completed ? 'checked' : '' }}
                            class="dark:bg-gray-900 dark:border-gray-600"
                        />
                        <label for="pending" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Pendiente</label>
                    </article>
                </div>
                
                <div class="flex justify-between">
                    <button
                        type="submit"
                        class="px-4 py-2 bg-amber-600 text-white rounded-md hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:bg-amber-700 dark:hover:bg-amber-800"
                    >
                        Guardar Tarea
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection