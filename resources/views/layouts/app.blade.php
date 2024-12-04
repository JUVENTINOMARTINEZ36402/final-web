<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Eventos') }}</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include other meta tags or external CSS if needed -->
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-blue-500 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-semibold">Eventos</a>
        <div>
            <a href="{{ route('events.index') }}" class="ml-4 hover:underline">Eventos</a>
            <a href="{{ route('user.index') }}" class="ml-4 hover:underline">Usuarios</a>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="py-8">
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-blue-500 text-white py-4 mt-8">
    <div class="container mx-auto text-center">
        <p>&copy; {{ date('Y') }} Eventos. Todos los derechos reservados.</p>
    </div>
</footer>

</body>
</html>
