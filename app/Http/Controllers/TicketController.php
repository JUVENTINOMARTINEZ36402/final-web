<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function buy($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('tickets.pay', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|unique:payments,transaction_id',
            'amount' => 'required|numeric',
            'event_id' => 'required|exists:events,id',
        ]);

        $ticket = Ticket::create([
            'event_id' => $request->event_id,
            'user_id' => Auth::id(),
            'price' => $request->amount,
            'quantity' => 1,
            'ticket_type' => 'General',
        ]);

        $ticket->payment()->create([
            'amount' => $request->amount,
            'payment_method' => 'PayPal',
            'transaction_id' => $request->transaction_id,
            'is_successful' => 1,
        ]);

        return response()->json(['success' => true, 'ticket_id' => $ticket->id]);
    }

    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('tickets.index', compact('tickets'));
    }
}
