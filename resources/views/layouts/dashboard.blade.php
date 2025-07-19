@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inicio')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('icons/lists.svg')}}" type="image/x-icon">
    <style>
        @view-transition {
            navigation: auto;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-700  min-h-screen flex flex-col justify-between">
    @include('components.navbar')
    <main class="flex-1 container mx-auto px-4 py-8">
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>
@livewireScripts