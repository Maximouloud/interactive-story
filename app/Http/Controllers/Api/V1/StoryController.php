<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
        return response()->json(Story::with('chapters.choices')->get());
    }

    public function show(Story $story)
    {
        return response()->json($story->load('chapters.choices'));
    }
}
