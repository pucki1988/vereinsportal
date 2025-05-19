<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Club;


class HomeController extends Controller
{
    public function index()
    {
    $events = Event::where('is_visible', true)
                   ->where('start', '>=', now()->startOfDay())
                   ->orderBy('start')
                   ->take(3)
                   ->with('club')
                   ->get();

    $clubs = Club::orderBy('name')->get();

    return view('public.home', compact('events','clubs'));
    }
}
