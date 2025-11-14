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
        $gifts = Gift::orderBy('name')->get();
        return view('welcome', compact('gifts'));
    }

    public function saveTheDate()
    {
        $weddingDate = '2026-05-09';
        $venue = Venue::ceremony()->first();
        
        return view('save-the-date', compact('weddingDate', 'venue'));
    }

    public function submitRsvp(Request $request)
    {
        // TODO: Implement RSVP submission logic
        // For now, just return success
        return redirect()->route('home')->with('success', 'Obrigado por confirmar sua presença!');
    }
}
