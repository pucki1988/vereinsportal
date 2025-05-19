<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class PublicClubController extends Controller
{
    public function show(Club $club)
    {
        return view('public.clubs.show', compact('club'));
    }
}
