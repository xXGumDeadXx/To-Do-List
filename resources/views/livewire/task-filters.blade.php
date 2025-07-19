<div class="mb-6 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
    <div class="flex justify-between items-center mb-3">
        <h3 class="font-medium text-gray-900 dark:text-gray-100">Filtrar tareas:</h3>
        <button wire:click="resetFilters" class="text-xs text-blue-500 dark:text-blue-300 hover:underline">
            Reiniciar filtros
        </button>
    </div>

    <div class="flex flex-wrap gap-4 justify-center md:justify-start items-center">
        <div>
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model.live="filters.showCompleted" class="rounded text-green-500 dark:bg-gray-700 dark:border-gray-600">
                <span class="ml-2 text-gray-800 dark:text-gray-200">Completadas</span>
                <span class="ml-1">{{ $filters['showCompleted'] ? '✔️' : '❌' }}</span>
            </label>
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model.live="filters.showPending" class="rounded text-yellow-500 dark:bg-gray-700 dark:border-gray-600">
                <span class="ml-2 text-gray-800 dark:text-gray-200">Pendientes</span>
                <span class="ml-1">{{ $filters['showPending'] ? '✔️' : '❌' }}</span>
            </label>
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model.live="filters.showOverdue" class="rounded text-red-500 dark:bg-gray-700 dark:border-gray-600">
                <span class="ml-2 text-gray-800 dark:text-gray-200">Atrasadas</span>
                <span class="ml-1">{{ $filters['showOverdue'] ? '✔️' : '❌' }}</span>
            </label>
        </div>

        <div class="flex flex-col gap-1">
            <label class="flex items-center gap-2 flex-col md:flex-row">
                <div class="flex flex-col items-start">
                    <label class="text-xs text-gray-600 dark:text-gray-400" for="fromDate" max="{{ $filters['toDate'] ?? '' }}">Desde</label>
                    <input id="fromDate" type="date" wire:model.live="filters.fromDate" class="rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-100 px-2 py-1" placeholder="Desde">
                    @error('filters.fromDate')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <span class="text-gray-500 dark:text-gray-400">--</span>
                <div class="flex flex-col items-start">
                    <label class="text-xs text-gray-600 dark:text-gray-400" for="toDate">Hasta</label>
                    <input id="toDate" type="date" wire:model.live="filters.toDate" class="rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600 text-gray-900 dark:text-gray-100 px-2 py-1" placeholder="Hasta" min="{{ $filters['fromDate'] ?? '' }}">
                    @error('filters.toDate')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </label>
        </div>
    </div>
</div>