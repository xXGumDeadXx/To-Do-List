<form wire:submit.prevent="register" class="bg-white dark:bg-gray-900 p-6 rounded">
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Correo electrónico</label>
        <input type="email" id="email" wire:model.live.debounce.500ms="email"
            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-amber-500"
            required placeholder="Explain@explain.com">
        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre</label>
        <input type="text" id="name" wire:model.live.debounce.500ms="name"
            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-amber-500"
            required placeholder="Nombre">
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contraseña</label>
        <input type="password" id="password" wire:model.live.debounce.500ms="password"
            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-amber-500"
            required placeholder="Contraseña">
        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="confirPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-200">ConfirmarContraseña</label>
        <input type="password" id="confirmpPassword" wire:model.live.debounce.500ms="password_confirmation"
            class="mt-1 block w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-amber-500"
            required placeholder="Confirmar Contraseña">
        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    @if ($errorMessage)
        <p class="text-red-500 text-lg text-center font-bold mb-4">{{ $errorMessage }}</p>
    @endif
    <div class="flex justify-around">
        <button type="submit" class="bg-linear-60 to-amber-600 from-amber-400 text-white px-4 py-2 rounded hover:bgambere-700 dark:hover:bg-amber-600 cursor-pointer" wire:loading.attr="disabled" wire:target="register">
            <span wire:loading.remove wire:target="register">Entrar</span>
            <span wire:loading wire:target="register">Cargando...</span>
        </button>
    </div>
</form>