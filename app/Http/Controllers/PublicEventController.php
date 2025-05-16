<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Club;

class PublicEventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query()
        ->with('club')
        ->where('is_visible', true)
        ->orderBy('start');

        // Filter nach Verein (club_id)
        if ($request->filled('club_id')) {
            $query->where('club_id', $request->club_id);
        }

         // Filter nach Zeitraum
        if ($request->filled('start_date')) {
            $query->whereDate('start', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('start', '<=', $request->end_date);
        }

        $events = $query->get();
        $clubs = Club::orderBy('name')->get();

        return view('public.events.index', compact('events', 'clubs'));
    }

    public function show(Event $event)
    {
        
        abort_unless($event->is_visible, 404); // Verhindert Anzeige unsichtbarer Events
        return view('public.events.show', compact('event'));
    }
}
