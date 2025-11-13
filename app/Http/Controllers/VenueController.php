<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        $ceremony = Venue::ceremony()->first();
        $reception = Venue::reception()->first();
        $venues = Venue::orderBy('event_date')->orderBy('event_time')->get();
        
        return view('venues.index', compact('ceremony', 'reception', 'venues'));
    }

    public function show(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }
}
