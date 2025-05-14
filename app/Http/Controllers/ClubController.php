<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
class ClubController extends Controller
{
    public function index()
    {
    $clubs = Club::all();
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
        'color' => 'string|max:255'
    ]);

    Club::create(['name' => $request->name,'color' => $request->color]);

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
        'color' => 'string|max:255',
    ]);

    // Aktualisieren der Daten
    $club->update([
        'name' => $request->name,
        'color' => $request->color,
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
}
