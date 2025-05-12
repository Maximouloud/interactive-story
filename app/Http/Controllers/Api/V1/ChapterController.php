<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;

class ChapterController extends Controller
{
    public function index()
    {
        return response()->json(Chapter::with('choices')->get());
    }

    public function show(Chapter $chapter)
    {
        return response()->json($chapter->load('choices'));
    }

    public function store(StoreChapterRequest $request)
{
    try {
        $chapter = Chapter::create($request->validated());
        return response()->json([
            'message' => 'Chapter created successfully.',
            'data' => $chapter,
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error creating chapter.',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
