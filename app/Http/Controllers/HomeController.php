<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all events
        $events = Event::all();

        // Pass events to the view
        return view('home', compact('events'));
    }
}
