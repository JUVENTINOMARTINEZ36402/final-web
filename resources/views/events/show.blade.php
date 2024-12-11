<x-app-layout>
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <p class="text-3xl font-bold text-gray-800">{{ $event->title }}</p>
        <p class="text-gray-600 mt-2">Date & Time: {{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y, g:i a') }}</p>
        <p class="text-gray-600 mt-1">Location: {{ $event->location }}</p>
        <p class="text-gray-600 mt-1">Description: {{ $event->description }}</p>

        @if($event->logo_image)
            <div class="mt-4">
                <p class="text-gray-600">Logo:</p>
                <img src="{{ asset('storage/' . $event->logo_image) }}" alt="Event Logo" class="h-40 rounded-md mt-2">
            </div>
        @endif

        <p class="text-gray-600 mt-2">Status: <span class="{{ $event->status ? 'text-green-600' : 'text-red-600' }}">{{ $event->status ? 'Active' : 'Inactive' }}</span></p>
    </div>

    <!--<div class="mt-6 flex justify-end">
        <a class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-amber-500 hover:text-red-600 transition duration-200 ease-in-out" href="{{ route('events.edit', $event->id) }}">EDIT</a>
    </div> -->
</x-app-layout>
