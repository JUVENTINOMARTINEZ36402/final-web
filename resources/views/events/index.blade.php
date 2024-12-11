<!-- resources/views/events/index.blade.php -->
<x-app-layout>
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Lista de Eventos ✅</h1>
    <ul class="space-y-4">
        @foreach($events as $event)
            <li class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md">
                <!-- Event Info -->
                <div class="text-gray-700">
                    <span class="font-semibold text-lg">{{ $event->title }}</span>
                    <span class="text-sm text-gray-500">({{ $event->event_date }})</span>
                    <span class="text-gray-600">- {{ $event->location }}</span>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-3">
                    <a href="{{ route('events.show', $event->id) }}"
                       class="px-3 py-1 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 transition">
                        VIEW
                    </a>
                    <a href="{{ route('events.edit', $event->id) }}"
                       class="px-3 py-1 bg-yellow-500 text-white text-sm font-medium rounded hover:bg-yellow-600 transition">
                        EDIT
                    </a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-500 text-white text-sm font-medium rounded hover:bg-red-600 transition"
                                onclick="return confirm('Are you sure you want to delete this event?')">
                            DELETE
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Add Event Button -->
    <div class="mt-8 text-right">
        <a href="{{ route('events.create') }}"
           class="inline-block px-5 py-2 bg-green-500 text-white text-sm font-medium rounded-lg shadow-md hover:bg-green-600 transition">
            Add Event
        </a>
    </div>
</x-app-layout>
