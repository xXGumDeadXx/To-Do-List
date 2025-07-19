{{-- Este template de Blade representa el estilo de la paginacion de las tareas con tema oscuro --}}
<div class="flex justify-center mt-6">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="bg-gray-300 dark:bg-gray-800 shadow rounded-lg px-4 py-3 flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 rounded bg-gray-400 dark:bg-gray-700 text-gray-100 dark:text-gray-400 cursor-not-allowed">Anterior</span>
            @else
                <button
                    wire:click="previousPage"
                    wire:loading.attr="disabled"
                    rel="prev"
                    class="px-3 py-1 rounded bg-amber-600 text-white hover:bg-amber-700 transition"
                >
                    Anterior
                </button>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-1 text-gray-400">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 rounded bg-amber-700 text-white font-bold">{{ $page }}</span>
                        @else
                            <button
                                wire:click="gotoPage({{ $page }})"
                                class="px-3 py-1 rounded bg-gray-600 dark:bg-gray-700 text-gray-200 hover:bg-amber-800 hover:text-white transition"
                            >
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button
                    wire:click="nextPage"
                    wire:loading.attr="disabled"
                    rel="next"
                    class="px-3 py-1 rounded bg-amber-600 text-white hover:bg-amber-700 transition"
                >
                    Siguiente
                </button>
            @else
                <span class="px-3 py-1 rounded bg-gray-700 text-gray-400 cursor-not-allowed">Siguiente</span>
            @endif
        </nav>
    @endif
</div>
