@extends('layouts.app')

@section('content')
    <h2>Create an Event</h2>
    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Event Title" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Event Description" required></textarea>
        </div>

        <div>
            <label for="event_date">Event Date & Time</label>
            <input type="datetime-local" id="event_date" name="event_date" required>
        </div>

        <div>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder="Event Location" required>
        </div>

        <div>
            <label for="logo_image">Logo Image</label>
            <input type="file" id="logo_image" name="logo_image" accept="image/*">
        </div>

        <div>
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <div>
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
