<x-guest-layout>
    <!-- Contenedor principal ocupando toda la pantalla con una imagen de fondo -->
    <div class="w-full h-screen flex flex-col justify-center items-center bg-cover bg-center"
         style="background-image: url('{{ asset('images/background.jpg') }}');">

        <!-- Imagen del logo -->
        <img src="{{ asset('images/logo.jpeg') }}" alt="Eventify Logo" class="w-100 h-60 mb-24 rounded-full shadow-lg">

        <!-- Encabezado principal -->
        <h1 class="text-5xl font-bold text-white mb-6 drop-shadow-lg">
            Eventify
        </h1>

        <!-- Botones de Login y Register -->
        <div class="flex justify-center space-x-4 mb-6">
            <a href="{{ route('login') }}" class="px-6 py-2 text-lg font-semibold text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-700">
                Login
            </a>
            <a href="{{ route('register') }}" class="px-6 py-2 text-lg font-semibold text-white bg-green-500 rounded-lg shadow-md hover:bg-green-700">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>
