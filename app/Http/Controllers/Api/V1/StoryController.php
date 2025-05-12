<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Http\Requests\StoreStoryRequest;


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

    public function store(StoreStoryRequest $request)
{
    try {
        $story = Story::create($request->validated());
        return response()->json([
            'message' => 'Story created successfully.',
            'data' => $story
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while creating the story.',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
