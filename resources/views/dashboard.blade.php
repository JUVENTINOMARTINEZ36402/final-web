<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Eventify') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <!-- Welcome Message -->
        <div class="bg-purple-600 text-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold">Hola, {{ Auth::user()->name }}!</h1>
            <p class="mt-4 text-lg">Bienvenido al Panel de Eventos.</p>
        </div>

        <!-- Upcoming Events Section -->
        <div class="mt-8 text-center">
            <h2 class="text-xl font-semibold text-black">Proximos Eventos:</h2>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="bg-white p-4 rounded-lg shadow-md text-center">
                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                        <div class="flex justify-center mt-6">
                            <img src="{{ asset('storage/' . $event->logo_image) }}" alt="Logo de Evento" class="w-32 h-32 object-cover rounded-md">
                        </div>
                        <p class="text-gray-600">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="text-blue-500 hover:underline">Detalles</a>
                        <a href="{{ route('tickets.buy', $event->id) }}" class="mt-2 inline-block text-white bg-green-500 px-4 py-2 rounded-lg hover:bg-green-600">
                            Comprar boletos
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
