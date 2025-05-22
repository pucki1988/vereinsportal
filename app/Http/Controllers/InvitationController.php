<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Invitation;
use App\Models\Club;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;
use Illuminate\Support\Carbon;

class InvitationController extends Controller
{
    public function create()
    {
        $clubs = Club::all();
        return view('invitations.create', compact('clubs'));
    }

    public function index()
    {
        $invitations = Invitation::with('club')->latest()->paginate(10);
        return view('invitations.index', compact('invitations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'club_id' => 'required|exists:clubs,id',
        ]);

        $token = Str::random(64);

        $invitation = Invitation::create([
            'email' => $request->email,
            'club_id' => $request->club_id,
            'token' => $token,
            'role' => 'manager',
            'expires_at' => now()->addDays(30),
        ]);

        Mail::to($request->email)->send(new InvitationMail($invitation));

        //eturn redirect()->back()->with('success', 'Einladung versendet.');
        return redirect()
        ->route('invitations.index')
        ->with('success', 'Die Einladung wurde versendet.');
    }

    public function destroy(Invitation $invitation)
    {
        $invitation->delete();

        return redirect()->route('invitations.index')
            ->with('success', 'Einladung gelöscht.');
    }

}
