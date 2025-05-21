<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class PublicClubController extends Controller
{
    public function show(Club $club)
    {
        $club->load(['events' => function ($query) {
            $query->where('start', '>=', now()->startOfDay())->orderBy('start');
        }]);
        return view('public.clubs.show', compact('club'));
    }
}
