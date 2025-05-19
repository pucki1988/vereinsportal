<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardMember;

class BoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = BoardMember::all();
        return view('board_members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board_members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'position' => 'required|string|max:255',
            'is_legal_representative' => 'boolean',
        ]);

        BoardMember::create($validated);

        return redirect()->route('board-members.index')->with('success', 'Mitglied hinzugefügt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BoardMember $boardMember)
    {
        return view('board_members.edit', compact('boardMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardMember $boardMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'position' => 'required|string|max:255',
            'is_legal_representative' => 'boolean',
        ]);

        $boardMember->update($validated);

        return redirect()->route('board-members.index')->with('success', 'Mitglied aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardMember $boardMember)
    {
        $boardMember->delete();

        return redirect()->route('board-members.index')->with('success', 'Mitglied gelöscht.');
    }
}
