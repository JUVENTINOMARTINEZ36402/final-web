<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

<!-- El fondo cubre toda la pantalla -->
<div class="w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}');">

    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0">

        <!-- Logo -->
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <!-- El contenedor ahora ocupa el 100% de la pantalla y no tiene límite de ancho -->
        <div class="w-full px-6 py-4 bg-gradient-to-b from-white to-purple-600 shadow-md overflow-hidden sm:rounded-lg max-w-full">
            {{ $slot }}
        </div>

    </div>
</div>
</body>
</html>
