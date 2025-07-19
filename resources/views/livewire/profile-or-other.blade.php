<div class="max-w-4xl mx-auto p-4">
    <!-- Pestañas de navegación -->
    <div class="flex border-b border-gray-200 ">
        <button
            wire:click="switchTab('profile')"
            @class([
                'px-4 py-2 font-medium text-sm focus:outline-none',
                'text-amber-600 border-b-2 border-amber-600 hover:text-amber-700 hover:border-amber-700' => $activeTab === 'profile',
                'text-gray-500 hover:text-gray-700 dark:hover:text-gray-200 dark:text-gray-300' => $activeTab !== 'profile'
            ])
        >
            Perfil
        </button>
        
        <button
            wire:click="switchTab('other')"
            @class([
                'px-4 py-2 font-medium text-sm focus:outline-none',
                'text-amber-600 border-b-2 border-amber-600' => $activeTab === 'other',
                'text-gray-500 hover:text-gray-700 dark:hover:text-gray-200 dark:text-gray-300' => $activeTab !== 'other'
            ])
        >
            Mas
        </button>
    </div>

    <!-- Contenido dinámico -->
    <div class="mt-6">
        @if($activeTab === 'profile')
            <livewire:profile-section />
        @else
            <livewire:other-section />
        @endif
    </div>
</div>