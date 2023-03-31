<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('homepage', compact('songs'));
    }
}
