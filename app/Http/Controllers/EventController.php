<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $events = Event::where('user_id', auth()->id())->get();

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
            'description' => 'required|string|max:1000',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|boolean',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
        ]);


        $data = $request->all();

        if ($request->hasFile('logo_image')) {
            $path = $request->file('logo_image')->store('logos', 'public');
            $data['logo_image'] = $path;
        }

      Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'status' => $request->status,
            'user_id' => auth()->id(), // Asociar el evento al usuario autenticado
        ]);

        // Cambia el rol del usuario a "admin" después de crear el evento
        $user = auth()->user();
        $user->update(['role' => 'admin']);


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
        $event->logo_image_url = asset('storage/' . $event->logo_image);
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|boolean',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de la imagen
        ]);

        if ($request->hasFile('logo_image')) {
            // Elimina la imagen anterior si existe
            if ($event->logo_image) {
                Storage::delete('public/' . $event->logo_image);
            }
            $path = $request->file('logo_image')->store('logos', 'public');
            $event->logo_image = $path;
        }
        $event->update($request->except('logo_image'));

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
        // Opcional: eliminar la imagen asociada
        if ($event->logo_image && file_exists(public_path($event->logo_image))) {
            unlink(public_path($event->logo_image));
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    /**
     * Show the dashboard with user information and events.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $events = Event::all(); // Fetch events (can filter based on user preferences if needed)
        return view('dashboard', compact('events'));
    }
}
