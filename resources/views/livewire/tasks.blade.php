
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @if(!$tasks->isEmpty())
        @foreach($tasks as $task)
            <article class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 flex flex-col gap-3 border-l-4 overflow-hidden {{ 
                $task->completed ? 'border-green-400' : 
                (!$task->completed && $task->due_date < date('Y-m-d') ? 'border-red-400' : 'border-yellow-400') 
            }}" aria-labelledby="tarea1-title" wire:key="task-{{$task->id}}">
                <header class="flex items-center gap-2">
                    @if ($task->completed)
                        <span class="inline-block w-3 h-3 bg-green-400 rounded-full" aria-hidden="true"></span>
                        <span class="text-xs text-green-700 dark:text-green-300 font-semibold">Completada</span>
                    @elseif(!$task->completed && $task->due_date < date('Y-m-d'))
                        <span class="inline-block w-3 h-3 bg-red-400 rounded-full" aria-hidden="true"></span>
                        <span class="text-xs text-red-700 dark:text-red-300 font-semibold">Atrasada</span>
                    @else
                        <span class="inline-block w-3 h-3 bg-yellow-400 rounded-full" aria-hidden="true"></span>
                        <span class="text-xs text-yellow-700 dark:text-yellow-300 font-semibold">Pendiente</span>
                    @endif
                </header>
                <h2 id="tarea1-title" class="text-lg font-bold text-gray-800 dark:text-gray-100">{{Str::limit($task->title, 25)}}</h2>
                <p class="text-gray-600 dark:text-gray-300">{{Str::limit($task->description, 35)}}</p>
                <footer class="flex justify-between items-center mt-2">
                    <time class="text-xs text-gray-400 dark:text-gray-400" datetime="2024-06-15">Vence: {{$task->due_date}}</time>
                    <a href="{{route('tasks.edit', ['id'=>$task->id])}}" class="text-amber-500 dark:text-amber-300 hover:underline text-xs font-semibold">Ver detalles</a>
                </footer>
            </article>
        @endforeach
    @else
        <div class="col-span-full py-8 text-center">
            <h2 class="text-lg font-bold text-gray-600 dark:text-gray-200">Oppss... Parece que no tienes tareas registradas</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Crea tu primera tarea usando el botón arriba. 👆</p>
        </div>
    @endif
    <div class="col-span-full mt-6">
        {{$tasks->links('paginate')}}
    </div>
</div>
