@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="text-2xl font-bold">{{ $event->title }}</p>
        <p>Date & Time: {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y, g:i a') }}</p>
        <p>Location: {{ $event->location }}</p>
        <p>Description: {{ $event->description }}</p>

        @if($event->logo_image)
            <div class="mt-4">
                <p>Logo:</p>
                <img src="{{ asset('storage/' . $event->logo_image) }}" alt="Event Logo" class="h-40">
            </div>
        @endif

        <p>Status: {{ $event->status ? 'Active' : 'Inactive' }}</p>
    </div>

    <div class="mt-6">
        <a class="bg-gray-600 text-white px-3 rounded border border-gray-600 hover:bg-amber-500 hover:text-red-600" href="{{ route('events.edit', $event->id) }}">EDIT</a>
    </div>
@endsection
