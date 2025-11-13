<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Venue;
use App\Models\Gift;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stories = Story::active()->ordered()->take(3)->get();
        $venues = Venue::orderBy('event_date')->orderBy('event_time')->get();
        $featuredGifts = Gift::available()->take(6)->get();

        return view('home', compact('stories', 'venues', 'featuredGifts'));
    }

    public function saveTheDate()
    {
        $weddingDate = '2026-05-09';
        $venue = Venue::ceremony()->first();
        
        return view('save-the-date', compact('weddingDate', 'venue'));
    }
}
