<!-- Login Modal -->

<!-- Light/Dark Theme Login Form -->
<form wire:submit.prevent="login" class="bg-white dark:bg-gray-900 p-6 rounded">
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Correo electrónico</label>
        <input type="email" id="email" wire:model.live.debounce.500ms="email" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded px-3 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-blue-400" required placeholder="Explain@explain.com">
        @error('email') <span class="text-red-600 dark:text-red-400 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contraseña</label>
        <input type="password" id="password" wire:model.live.debounce.500ms="password" class="mt-1 block w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded px-3 py-2 focus:outline-none focus:border-amber-500 dark:focus:border-amber-400" required placeholder="Contraseña">
        @error('password') <span class="text-red-600 dark:text-red-400 text-xs">{{ $message }}</span> @enderror
    </div>
    @if ($errorMessage)
        <p class="text-red-600 dark:text-red-400 text-lg text-center font-bold mb-4">{{ $errorMessage }}</p>
    @endif
    <div class="flex justify-around">
        <button type="submit" class="bg-linear-60 to-amber-600 from-amber-400 text-white px-4 py-2 rounded hover:bgambere-700 dark:hover:bg-amber-600 cursor-pointer" wire:loading.attr="disabled" wire:target="login" >
            <span wire:loading.remove wire:target="login">Entrar</span>
            <span wire:loading wire:target="login">Cargando...</span>
        </button>
    </div>
</form>
