<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comic;

class PageController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return view('home', compact('comics'));
    }

    public function comics()
    {
        $comics = Comic::all();
        return view('comics', compact('comics'));
    }

    public function about()
    {
        return view('about');
    }
}
