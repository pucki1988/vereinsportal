<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
class ClubController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        if ($user->hasRole('manager')) {
            $clubs = Club::where('id', $user->club_id)->get();
        } else {
            $clubs = Club::all(); // z. B. für Admin
        }



       
        return view('clubs.index', compact('clubs'));
    }

public function create()
{
    return view('clubs.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'website' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255'
    ]);

    Club::create([
        'name' => $request->name,
        'website' => $request->website,
        'address' => $request->address,
        'send_to_church'=>$request->boolean('send_to_church'),
        'send_to_community'=>$request->boolean('send_to_community')
    ]);

    return redirect()->route('clubs.index')->with('success', 'Der Verein wurde erfolgreich erstellt.');
}
public function edit(Club $club)
{
    return view('clubs.edit', compact('club'));
}

public function update(Request $request, Club $club)
{
    // Validierung der Eingaben
    $request->validate([
        'name' => 'required|string|max:255',
        'color' => 'nullable|string|max:255',
        'website' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255'
    ]);


    // Aktualisieren der Daten
    $club->update([
        'name' => $request->name,
        'color' => $request->color,
        'website' => $request->website,
        'address' => $request->address,
        'send_to_church'=>$request->boolean('send_to_church'),
        'send_to_community'=>$request->boolean('send_to_community')
    ]);

    return redirect()
        ->route('clubs.index')
        ->with('success', 'Der Verein wurde erfolgreich aktualisiert.');
}
public function destroy(Club $club)
{
    $club->delete();

    return redirect()->route('clubs.index')
        ->with('success', 'Verein erfolgreich gelöscht.');
}

    public function show(Club $club)
    {
        $user = auth()->user();

        if ($user->hasRole('manager') && $user->club_id !== $club->id) {
            abort(403);
        }

        return view('clubs.show', compact('club'));
    }


}
