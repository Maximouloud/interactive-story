<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Choice;

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
}
