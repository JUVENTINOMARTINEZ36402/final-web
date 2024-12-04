@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-black">Edit Event</h1>

    <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label class="font-bold" for="title">Title:</label>
            <input class="border border-gray-600" type="text" id="title" name="title" value="{{ $event->title }}" required>
        </div>

        <div>
            <label class="font-bold align-top" for="description">Description:</label>
            <textarea class="bg-gray-300 border border-gray-600" id="description" name="description" required>{{ $event->description }}</textarea>
        </div>

        <div>
            <label class="font-bold" for="event_date">Event Date & Time:</label>
            <input class="border border-gray-600" type="datetime-local" id="event_date" name="event_date"
                   value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div>
            <label class="font-bold" for="location">Location:</label>
            <input class="border border-gray-600" type="text" id="location" name="location" value="{{ $event->location }}" required>
        </div>

        <div>
            <label class="font-bold" for="logo_image">Logo Image:</label>
            <input class="border border-gray-600" type="file" id="logo_image" name="logo_image" accept="image/*">
            @if ($event->logo_image)
                <p>Current Logo: <img src="{{ asset('storage/' . $event->logo_image) }}" alt="Event Logo" class="h-20 mt-2"></p>
            @endif
        </div>

        <div>
            <label class="font-bold" for="status">Status:</label>
            <select class="border border-gray-600" id="status" name="status" required>
                <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mt-6">
            <button class="bg-gray-600 text-white px-3 rounded border border-gray-600 hover:bg-cyan-400 hover:text-red-700" type="submit">SAVE</button>
            <a class="bg-gray-600 text-white px-3 rounded border border-gray-600 hover:bg-pink-600 hover:text-purple-300" href="{{ route('events.show', $event->id) }}">BACK</a>
        </div>
    </form>
@endsection
