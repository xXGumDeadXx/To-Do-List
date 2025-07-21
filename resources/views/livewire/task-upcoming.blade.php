<div class="space-y-2 w-full ">
    <h3 class="font-medium text-lg dark:text-gray-100 my-7">Tareas próximas (próximos 3 días)</h3>
    <div class="flex flex-col md:flex-row gap-10 justify-center flex-wrap   ">
        @forelse($upcomingTasks as $task)
            <article 
                class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 flex flex-col gap-3 border-l-4 overflow-hidden md:min-w-md md:max-w-md {{ $task->completed ? 'border-green-400' : 'border-yellow-400' }}"
                aria-labelledby="tarea-title-{{$task->id}}" 
                wire:key="task-{{$task->id}}"
                data-key="{{ $task->id }}"
            >
                <header class="flex items-center gap-2">
                    @if ($task->completed)
                        <span class="inline-block w-3 h-3 bg-green-400 rounded-full" aria-hidden="true"></span>
                        <span class="text-xs text-green-700 dark:text-green-300 font-semibold">Completada</span>
                    @else
                        <span class="inline-block w-3 h-3 bg-yellow-400 rounded-full" aria-hidden="true"></span>
                        <span class="text-xs text-yellow-700 dark:text-yellow-300 font-semibold">Pendiente</span>
                    @endif
                </header>
                <h2 id="tarea-title-{{$task->id}}" class="text-lg font-bold text-gray-800 dark:text-gray-100">
                    {{ \Illuminate\Support\Str::limit($task->title, 25) }}
                </h2>
                <p class="text-gray-600 dark:text-gray-300">
                    {{ \Illuminate\Support\Str::limit($task->description, 35) }}
                </p>
                <footer class="flex justify-between items-center mt-2">
                    <time class="text-xs text-gray-400 dark:text-gray-400" datetime="{{ $task->due_date }}">
                        Vence: {{ $task->due_date }}
                    </time>
                    <a href="{{ route('tasks.edit', ['id'=>$task->id]) }}" class="text-amber-500 dark:text-amber-300 hover:underline text-xs font-semibold">
                        Ver detalles
                    </a>
                </footer>
                @if(!$task->completed)
                    <button wire:click="markAsCompleted({{ $task->id }})" 
                            class="button-complete mt-2 px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded text-xs font-semibold cursor-pointer" >
                        Completar
                    </button>
                @endif
            </article>
        @empty
            <p class="text-gray-500 dark:text-gray-400">No hay tareas próximas en los próximos 3 días! A descansar.</p>
        @endforelse
    </div>
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.button-complete').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const taskElement = this.closest('article');
                // Aplicar animación
                taskElement.classList.add('animate-hidden-task');
            });
        });
    });
    </script>
</div>