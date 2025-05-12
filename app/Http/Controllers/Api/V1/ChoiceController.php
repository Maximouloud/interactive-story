<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Choice;
use App\Http\Requests\StoreChoiceRequest;


class ChoiceController extends Controller
{
    public function index()
    {
        return response()->json(Choice::all());
    }

    public function show(Choice $choice)
    {
        return response()->json($choice);
    }

    public function store(StoreChoiceRequest $request)
{
    try {
        $choice = Choice::create($request->validated());
        return response()->json([
            'message' => 'Choice created successfully.',
            'data' => $choice,
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error creating choice.',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
