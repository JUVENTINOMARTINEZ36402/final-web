<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">Mis Boletos</h1>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($tickets as $ticket)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold">Evento: {{ $ticket->event->title }}</h2>
                    <p>Precio: ${{ $ticket->price }}</p>
                    <p>Cantidad: {{ $ticket->quantity }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
