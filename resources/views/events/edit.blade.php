<!-- resources/views/events/edit.blade.php -->
<x-app-layout>
    <h1 class="text-2xl font-black mb-6 text-gray-800">Editar Evento ✏</h1>

    <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="form-group">
            <label class="font-bold text-gray-700" for="title">Title:</label>
            <input class="border border-gray-300 p-2 rounded w-full" type="text" id="title" name="title" value="{{ $event->title }}" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label class="font-bold text-gray-700 align-top" for="description">Description:</label>
            <textarea class="bg-gray-100 border border-gray-300 p-2 rounded w-full" id="description" name="description" required>{{ $event->description }}</textarea>
        </div>

        <!-- Event Date & Time -->
        <div class="form-group">
            <label class="font-bold text-gray-700" for="event_date">Event Date & Time:</label>
            <input class="border border-gray-300 p-2 rounded w-full" type="datetime-local" id="event_date" name="event_date"
                   value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i') }}" required>
        </div>

        <!-- Location -->
        <div class="form-group">
            <label class="font-bold text-gray-700" for="location">Location:</label>
            <input class="border border-gray-300 p-2 rounded w-full" type="text" id="location" name="location" value="{{ $event->location }}" required>
        </div>

        <!-- Logo Image -->
        <div class="form-group">
            <label class="font-bold text-gray-700" for="logo_image">Logo Image:</label>
            <input class="border border-gray-300 p-2 rounded w-full" type="file" id="logo_image" name="logo_image" accept="image/*">
            @if ($event->logo_image)
                <p class="mt-2 text-gray-600">Current Logo: <img src="{{ asset('storage/' . $event->logo_image) }}" alt="Event Logo" class="h-20 mt-2"></p>
            @endif
        </div>

        <!-- Status -->
        <div class="form-group">
            <label class="font-bold text-gray-700" for="status">Status:</label>
            <select class="border border-gray-300 p-2 rounded w-full" id="status" name="status" required>
                <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Save & Back Buttons -->
        <div class="mt-6 flex space-x-4">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition" type="submit">SAVE</button>
            <a class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition" href="{{ route('events.index', $event->id) }}">BACK</a>
        </div>
    </form>
</x-app-layout>
