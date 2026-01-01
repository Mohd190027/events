<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = event::take(6)->get();
        return view('home', compact('events'));
    }
    // public function index()
    // {
    //     $events = event::latest()->take(6)->get();
    //     return view('home', compact('events'));
    // }

    // البحث حسب المنطقة
    public function search(Request $request)
    {
        $events = Event::where('place', 'LIKE', '%'.$request->place.'%')->get();
        return view('home', compact('events'));
    }
}
