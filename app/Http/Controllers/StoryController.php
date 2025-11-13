<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::active()->ordered()->get();
        
        return view('stories.index', compact('stories'));
    }

    public function show(Story $story)
    {
        if (!$story->is_active) {
            abort(404);
        }

        return view('stories.show', compact('story'));
    }
}
