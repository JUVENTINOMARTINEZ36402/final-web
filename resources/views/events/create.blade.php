<x-app-layout>
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Crear Evento Nuevo ➕</h2>

    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Title -->
        <div class="flex flex-col">
            <label for="title" class="text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" placeholder="Event Title" required
                   class="mt-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Description -->
        <div class="flex flex-col">
            <label for="description" class="text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" placeholder="Event Description" required
                      class="mt-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <!-- Event Date & Time -->
        <div class="flex flex-col">
            <label for="event_date" class="text-sm font-medium text-gray-700">Event Date & Time</label>
            <input type="datetime-local" id="event_date" name="event_date" required
                   class="mt-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Location -->
        <div class="flex flex-col">
            <label for="location" class="text-sm font-medium text-gray-700">Location</label>
            <input type="text" id="location" name="location" placeholder="Event Location" required
                   class="mt-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Logo Image -->
        <div class="flex flex-col">
            <label for="logo_image" class="text-sm font-medium text-gray-700">Logo Image</label>
            <input type="file" id="logo_image" name="logo_image" accept="image/*"
                   class="mt-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Status -->
        <div class="flex flex-col">
            <label for="status" class="text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status" required
                    class="mt-1 p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <!-- Submit and Back Buttons -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('events.index') }}"
               class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition duration-200 ease-in-out">
                Back
            </a>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Save
            </button>
        </div>
    </form>
</x-app-layout>
