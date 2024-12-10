<x-guest-layout>
    <!-- Main container with gradient background covering the entire screen -->
    <div class="w-full min-h-screen flex flex-col justify-center items-center bg-gradient-to-r from-white to-gray-300">

        <!-- Eventify heading -->
        <h1 class="text-5xl font-bold text-gray-800 mb-6">Eventify</h1>

        <!-- Links to login and register pages -->
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="text-lg font-semibold text-blue-500 hover:text-blue-700">
                Login
            </a>
            <a href="{{ route('register') }}" class="text-lg font-semibold text-blue-500 hover:text-blue-700">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>
