<div class="md:fixed inset-0 flex items-center justify-center z-50 pt-10 md:pt-0 animate-fade-in-up">
    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-lg w-screen md:w-md p-6">
        @if($showRegister)
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-900 dark:text-white">Registrase</h2>
            <livewire:register>
            <p class="mt-4 text-center text-gray-600 dark:text-gray-300">
                Ya tienes cuenta?
                <button wire:click="toggleAuth" class="text-amber-600 dark:text-amber-400 underline cursor-pointer">Logeate</button>
            </p>
        @else
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-900 dark:text-white">Iniciar Sesión</h2>
            <livewire:login>
            <p class="mt-4 text-center text-gray-600 dark:text-gray-300">
                No tienes cuenta?
                <button wire:click="toggleAuth" class="text-amber-600 dark:text-amber-400 underline cursor-pointer">Registrarse</button>
            </p>
        @endif
         <div class="flex items-center my-4">
            <hr class="flex-grow border-t border-gray-300 dark:border-gray-700">
            <span class="mx-2 text-gray-500 dark:text-gray-400">o</span>
            <hr class="flex-grow border-t border-gray-300 dark:border-gray-700">
        </div>
        <div class="flex justify-center">
            <a href="{{route('google.login')}}" class="flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors ease-in">
                @include('components.google')
                Iniciar sesión con Google
            </a>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                // Busca el formulario visible (login o register)
                let form = document.querySelector('form:is(:not([style*="display: none"]))');
                if (form) {
                    e.preventDefault();
                    form.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
                }
            }
        });
    });
</script>
