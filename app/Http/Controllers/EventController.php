<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',  // Added validation for description
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|boolean', // Added validation for status
        ]);

        // Save event to database
        Event::create($request->all());

        // Redirect to events index page with success message
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }


    /**
     * Display the specified event.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\View\View
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\View\View
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',   // 'name' changed to 'title'
            'event_date' => 'required|date',         // 'date' changed to 'event_date'
            'location' => 'required|string|max:255',
        ]);

        // Update the event with the new data
        $event->update($request->all());

        // Redirect back to the events index page with a success message
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event)
    {
        // Delete the event
        $event->delete();

        // Redirect back to the events index page with a success message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
