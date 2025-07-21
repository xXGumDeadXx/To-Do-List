<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
    <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Nueva Tarea</h2>
    
    <form wire:submit="saveTask">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título*</label>
            <input
                type="text"
                wire:model.live="title"
                id="title"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:bg-gray-900 dark:text-gray-100 p-3"
                placeholder="Descripción breve de la tarea"
            >
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
            <textarea
                wire:model.live="description"
                id="description"
                rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm max-h-34 min-h-13 focus:border-amber-500 focus:ring-amber-500 dark:bg-gray-900 dark:text-gray-100 p-3"
                placeholder="Detalles adicionales (opcional)"
            ></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Límite</label>
            <input
                type="date"
                wire:model="due_date"
                id="due_date"
                min="{{ now()->format('Y-m-d') }}"
                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-amber-500 focus:ring-amber-500 dark:bg-gray-900 dark:text-gray-100 p-3 md:max-w-min"
            >
            @error('due_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <div class="flex justify-between">
            <button wire:click="resetForm" class="px-4 py-2 bg-white dark:bg-gray-700 text-amber-600 dark:text-amber-400 rounded-md hover:bg-amber-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                Borrar formulario
            </button>
            <button
                type="submit"
                class="px-4 py-2 bg-amber-600 dark:bg-amber-700 text-white rounded-md hover:bg-amber-700 dark:hover:bg-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 hover:scale-105 transition-transform cursor-pointer"
            >
                Guardar Tarea
            </button>
        </div>
    </form>
</div>
@script
    <script>
        $wire.on('taskCreated', () => {
            scrollBy({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        });
    </script>
@endscript