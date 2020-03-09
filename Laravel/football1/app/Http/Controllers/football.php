<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class football extends Controller
{
    public function index()
    {
        $player = DB::table('player')->get();
        return view('player', compact('player'));
    }
}