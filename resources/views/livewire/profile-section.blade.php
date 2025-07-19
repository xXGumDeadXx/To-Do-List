<div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
    <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Mi Perfil</h2>
    
    @if(session('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded dark:bg-green-900 dark:text-green-200">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit="save" class="mb-4">
        <div class="mb-4">
            <label class="block text-black dark:text-white mb-2">Nombre</label>
            <input type="text" wire:model.live="name" 
                   class="w-full px-3 py-2 border rounded-lg bg-gray-100 dark:bg-gray-900 dark:border-gray-600 dark:text-white" placeholder="Ingrese su nombre">
            @error('name')
                <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-4">
            <label class="block text-black dark:text-white mb-2">Email</label>
            <input type="email" wire:model="email" disabled
                   class="w-full px-3 py-2 border rounded-lg bg-gray-100 dark:bg-gray-900 dark:border-gray-600 dark:text-gray-400 cursor-not-allowed">
        </div>
        
        <button type="submit" 
                class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors cursor-pointer dark:bg-amber-700 dark:hover:bg-amber-800">
            Guardar Cambios
        </button>
    </form>
    <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Cambiar Contraseña</h2>
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded dark:bg-green-900 dark:text-green-200">
            {{ session('success') }}
        </div>
    @endif



    <form wire:submit.prevent="updatePassword" class="mb-4">
        @if ($isOAuth && !$containPassword)
            <div class="p-4 bg-blue-50 text-blue-700 rounded-lg mb-5">
                <p class="font-medium">Cuenta vinculada con Google</p>
                <p class="mt-1 text-sm">Estás a punto de establecer una contraseña local para tu cuenta. 
                Esto te permitirá iniciar sesión directamente en nuestro sitio.</p>
            </div>
        @endif

        @if ($isOAuth && $containPassword)
            <!-- Contraseña Actual -->
            <div class="mb-4" x-data="{ showPassword: false }">
                <label class="block text-black dark:text-white mb-2">Contraseña Actual</label>
                <div class="relative">
                    <input 
                        :type="showPassword ? 'text' : 'password'" 
                        wire:model.live="password" 
                        class="w-full px-3 py-2 border rounded-lg pr-10 bg-gray-100 dark:bg-gray-900 dark:border-gray-600 dark:text-white"
                        placeholder="Ingrese su contraseña actual"
                    >
                    <button 
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100"
                    >
                        <!-- SVGs igual -->
                        <svg x-show="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <span class="text-red-500 text-sm dark:text-red-400">{{ $message ?? '' }}</span>
                @enderror
            </div>
        @endif

        @if (!$isOAuth)
            <!-- Contraseña Actual -->
            <div class="mb-4" x-data="{ showPassword: false }">
                <label class="block text-black dark:text-white mb-2">Contraseña Actual</label>
                <div class="relative">
                    <input 
                        :type="showPassword ? 'text' : 'password'" 
                        wire:model.live="password" 
                        class="w-full px-3 py-2 border rounded-lg pr-10 bg-gray-100 dark:bg-gray-900 dark:border-gray-600 dark:text-white"
                        placeholder="Ingrese su contraseña actual"
                    >
                    <button 
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100"
                    >
                        <!-- SVGs igual -->
                        <svg x-show="!showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <span class="text-red-500 text-sm dark:text-red-400">{{ $message ?? '' }}</span>
                @enderror
            </div>
    
        @endif

        <!-- Nueva Contraseña -->
        <div class="mb-4" x-data="{ showNewPassword: false }">
            <label class="block text-black mb-2 dark:text-white">Nueva Contraseña</label>
            <div class="relative">
                <input 
                    :type="showNewPassword ? 'text' : 'password'" 
                    wire:model.live="new_password" 
                    class="w-full px-3 py-2 border rounded-lg pr-10 bg-gray-100 dark:bg-gray-900 dark:border-gray-600 dark:text-white"
                    placeholder="Ingrese su nueva contraseña"
                >
                <button 
                    type="button"
                    @click="showNewPassword = !showNewPassword"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100"
                >
                    <!-- SVGs igual -->
                    <svg x-show="!showNewPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="showNewPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>
            @error('new_password')
                <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirmar Nueva Contraseña -->
        <div class="mb-4" x-data="{ showConfirmPassword: false }">
            <label class="block text-black mb-2 dark:text-white">Confirmar Nueva Contraseña</label>
            <div class="relative">
                <input 
                    :type="showConfirmPassword ? 'text' : 'password'" 
                    wire:model.live="password_confirmation" 
                    class="w-full px-3 py-2 border rounded-lg pr-10 bg-gray-100 dark:bg-gray-900 dark:border-gray-600 dark:text-white"
                    placeholder="Confirme su nueva contraseña"
                >
                <button 
                    type="button"
                    @click="showConfirmPassword = !showConfirmPassword"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100"
                >
                    <!-- SVGs igual -->
                    <svg x-show="!showConfirmPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="showConfirmPassword" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>
            @error('password_confirmation')
                <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors cursor-pointer dark:bg-amber-700 dark:hover:bg-amber-800">
            Cambiar Contraseña
        </button>
    </form>
    <hr class="my-6 border-gray-300 dark:border-gray-600">
    <h3 class="text-xl font-semibold mb-4 text-red-900 dark:text-red-400">Danger Zone</h3>
    <form wire:submit.prevent="deleteAccount" class="mb-4">
        <h3 class="text-xl font-semibold mb-4 text-red-900 dark:text-red-400">Eliminar Cuenta</h3>
        <p class="mb-4 text-red-900 dark:text-red-400">Esta acción no se puede deshacer. ¿Está seguro de que desea eliminar su cuenta?</p>
        <button type="submit" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors cursor-pointer dark:bg-red-700 dark:hover:bg-red-800">
            Eliminar Cuenta
        </button>
    </form>
</div>