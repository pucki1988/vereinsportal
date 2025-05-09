<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class PublicEventController extends Controller
{
    public function index()
    {
        $events = Event::where('is_visible', true)
                  ->orderBy('start')
                  ->with('club') // falls du den Vereinsnamen anzeigen willst
                  ->get();

    return view('public.events.index', compact('events'));
    }
}
