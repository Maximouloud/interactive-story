<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function index()
    {
        return response()->json(Chapter::all());
    }

    public function show(Chapter $chapter)
    {
        return response()->json($chapter->load('choices'));
    }
}
