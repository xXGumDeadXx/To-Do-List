@vite(['resources/css/app.css', 'resources/js/app.js'])

@livewireStyles
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Todo List - Organiza tus tareas diarias de manera eficiente.">
    <meta name="keywords" content="Todo List, tareas, productividad, organización">
    <meta name="author" content="Angel Jesus Linarez Martinez">
    <meta name="copyright" content="© 2025 Angel Jesus Linarez Martinez">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('icons/lists.svg')}}" type="image/x-icon">
</head>
<body class="bg-gray-200 dark:bg-gray-700 min-h-screen flex flex-col">
    <main class="flex-1 container mx-auto px-4 py-8 flex flex-col items-center md:flex-row ">
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>
@livewireScripts