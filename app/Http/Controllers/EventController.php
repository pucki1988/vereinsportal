<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\Club;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        
    }

    // 👀 Liste aller sichtbaren Events (z. B. im Frontend)
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $events = Event::with('club')->orderBy('start')->get();
        } elseif(auth()->user()->hasRole('manager')) {
            $events = Event::where('club_id', auth()->user()->club_id)
                           ->orderBy('start')
                           ->get();
        }
        return view('events.index', compact('events'));
    }

    public function edit(Event $event)
    {
        // Alle Vereine laden, um sie im Select-Feld anzuzeigen
        $clubs = Club::all();

        // Event-Ansicht mit den geladenen Daten zurückgeben
        return view('events.edit', compact('event', 'clubs'));
    }

    public function update(Request $request, Event $event)
    {

        if(auth()->user()->hasRole('admin')){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'club_id' => 'required|exists:clubs,id',
        ]);
        

        

        // 🔍 Überschneidung prüfen
        $overlap = Event::where('id', '!=', $event->id) // eigenes Event ausschließen
            ->where('is_visible', true) // nur sichtbare Events
            ->where('created_at', '<', $event->created_at) // nur früher erstellte Events
            ->where(function ($query) use ($request) {
            $query->whereBetween('start', [$request->start, $request->end])
                  ->orWhereBetween('end', [$request->start, $request->end])
                  ->orWhere(function ($q) use ($request) {
                      $q->where('start', '<=', $request->start)
                        ->where('end', '>=', $request->end);
                  });
        })->exists();

        
        $data = [
                'title' => $request->title,
                'description' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'club_id' => $request->club_id,
                'is_visible' => $request->has('is_visible'),
                'location' => $request->location,
            ];

            $event->update($data);
            if ($overlap) {

                if($request->has('is_visible')){
                    return redirect()->route('events.index')->with('warning', 'Event wurde erfolgreich aktualisiert. Der Termin überschneidet sich aber mit einem anderen Event ist aber öffentlich sichtbar');
                }
                return redirect()->route('events.index')->with('warning', 'Event wurde erfolgreich aktualisiert. Der Termin überschneidet sich aber mit einem anderen Event und und ist derzeit öffentlich nicht sichtbar.');
            }
        }else{

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $overlap = Event::where('id', '!=', $event->id) // eigenes Event ausschließen
            ->where('is_visible', true) // nur sichtbare Events
            ->where('created_at', '<', $event->created_at) // nur früher erstellte Events
            ->where(function ($query) use ($event) {
            $query->whereBetween('start', [$event->start, $event->end])
                  ->orWhereBetween('end', [$event->start, $event->end])
                  ->orWhere(function ($q) use ($event) {
                      $q->where('start', '<=', $event->start)
                        ->where('end', '>=', $event->end);
                  });
        })->exists();
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
            ];

            $event->update($data);
            if ($overlap) {
                // 📩 Optional: andere Vereine benachrichtigen
                // Mail::to(...)->send(...);
                return redirect()->route('events.index')->with('warning', 'Event wurde erfolgreich aktualisiert. Der Termin überschneidet sich mit einem anderen Event und ist derzeit öffentlich nicht sichtbar.');
            }
        }
        return redirect()->route('events.index')->with('success', 'Event wurde erfolgreich aktualisiert.');
    }

    public function create()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            // Admin sieht alle Vereine
            $clubs = Club::all();
        } else {
            // Alle anderen sehen nur ihren eigenen Verein
            $clubs = Club::where('id', $user->club_id)->get();
        }

        return view('events.create', compact('clubs'));
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event erfolgreich gelöscht.');
    }

    // 🆕 Neues Event erstellen
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
            'end'   => 'required|date|after_or_equal:start',
            'description' => 'nullable|string',
        ]);

        $user = auth()->user();

        // Admins dürfen alles – Verein wird manuell gesetzt
        $clubId = $user->hasRole('admin')
            ? $request->input('club_id')
            : $user->club_id;

        // 🔍 Überschneidung prüfen
        $overlap = Event::where(function ($query) use ($request) {
                $query->whereBetween('start', [$request->start, $request->end])
                      ->orWhereBetween('end', [$request->start, $request->end])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('start', '<=', $request->start)
                            ->where('end', '>=', $request->end);
                      });
            })->exists();

        $isVisible = !$overlap;

        // Event anlegen
        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start' => $request->start,
            'end' => $request->end,
            'club_id' => $clubId,
            'is_visible' => $isVisible,
            'location' => $request->location,
        ]);

        if ($overlap) {
            // 📩 Optional: andere Vereine benachrichtigen
            // Mail::to(...)->send(...);

            return back()->with('warning', 'Der Termin überschneidet sich mit einem anderen Event und ist derzeit öffentlich nicht sichtbar.');
        }

        return back()->with('success', 'Event wurde erfolgreich erstellt.');
    }
}
