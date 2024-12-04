@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Hero Section -->
        <div class="bg-blue-500 text-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold">Bienvenidos a nuestro sitio de eventos</h1>
            <p class="mt-4 text-lg">Explora los eventos próximos y mantente actualizado.</p>
        </div>

        <!-- Upcoming Events Section -->
        <div class="mt-8 text-center">
            <h2 class="text-xl font-semibold text-black">Próximos Eventos</h2>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                        <p class="text-gray-600">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="text-blue-500 hover:underline">Ver más</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
