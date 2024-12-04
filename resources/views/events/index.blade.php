@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-gray-900">Event Index</h1>
    <ul>
        @foreach($events as $event)
            <li class="py-1">
                {{ $event->title }} - {{ $event->event_date }} - {{ $event->location }}
                <a class="bg-gray-600 text-white px-2 rounded border border-gray-600 hover:bg-green-500 hover:text-red-600" href="{{ route('events.show', $event->id) }}">VIEW</a>
                <a class="bg-gray-600 text-white px-3 rounded border border-gray-600 hover:bg-amber-500 hover:text-red-600" href="{{ route('events.edit', $event->id) }}">EDIT</a>
            </li>
        @endforeach
    </ul>
    <div class="mt-6">
        <a class="bg-pink-600 text-white px-3 rounded border border-gray-600 hover:bg-purple-500 hover:text-red-600" href="{{ route('events.create') }}">Add Event</a>
    </div>
@endsection
