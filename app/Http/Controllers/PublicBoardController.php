<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardMember;
class PublicBoardController extends Controller
{
    public function index()
    {
        $members = BoardMember::all();
        return view('public.board', compact('members'));
    }
}
