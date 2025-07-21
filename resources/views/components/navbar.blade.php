<header class="bg-white shadow dark:bg-gray-800 sticky top-0 left-0 w-full z-50">
    <div class="container mx-auto px-4 py-6 flex justify-center md:justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 hidden md:block">Todo List</h1>
        <nav class="flex items-center space-x-2">
            <a href="{{ route('dashboard') }}" class="text-gray-600 dark:text-gray-100 hover:text-amber-500 px-3" >Inicio</a>
            <a href="{{route('tasks')}}" class="text-gray-600 dark:text-gray-100 hover:text-amber-500 px-3">Tareas</a>
            <div class="relative inline-block text-left">
            <button
                type="button"
                class="flex items-center text-gray-600 dark:text-gray-100 hover:text-amber-500 px-3 focus:outline-none"
                id="user-menu-button"
                aria-expanded="false"
                aria-haspopup="true"
                onclick="
                document.getElementById('user-menu').classList.toggle('hidden');
                document.getElementById('icon').classList.toggle('rotate-180');
                "
            >
                <img
                src="{{Auth::user()->avatar}}"
                alt="Avatar"
                class="w-8 h-8 rounded-full mr-2"
                >
                <span class="truncate max-w-[100px]">
                {{ Str::limit(Auth::user()->name, 15, '...') }}
                </span>
                <svg class="ml-2 h-4 w-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div
                id="user-menu"
                class="hidden absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 dark:text-gray-100 ring-1 ring-black ring-opacity-5 z-50"
            >
                <div class="py-3 px-4 border-b flex items-center">
                <img
                    src="{{Auth::user()->avatar}}"
                    alt="Avatar"
                    class="w-10 h-10 rounded-full mr-3"
                > 
                <div>
                    <div class="font-semibold text-gray-800 truncate  dark:text-gray-100 " title="{{ Auth::user()->name }}">
                    {{ Str::limit(Auth::user()->name, 20, '...') }}
                    </div>
                </div>
                </div>
                <div class="py-1">
                    <a href="{{route('settings')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-100 ">Configuración</a>
                    <form method="POST" action="{{route('logout')}}">   
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-100">
                        Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
            </div>
            <script>
            // Cierra el menú si se hace clic fuera
            document.addEventListener('click', function(event) {
                const menuButton = document.getElementById('user-menu-button');
                const menu = document.getElementById('user-menu');
                const icon = document.getElementById('icon');
                if (!menuButton.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
                icon.classList.remove('rotate-180');
                }
            });
            </script>
        </nav>
    </div>
</header>