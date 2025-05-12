<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\StoryController;
use App\Http\Controllers\Api\V1\ChapterController;
use App\Http\Controllers\Api\V1\ChoiceController;

Route::prefix('v1')->group(function () {

    // ➤ Route de test GET : simple vérification que l'API répond
    Route::get('/test', function () {
        return response()->json(['message' => 'Hello, World from api!']);
    });

    // ➤ Route de test DELETE : exemple de méthode différente
    Route::delete('/test', function () {
        return response()->json(['message' => 'Deleting']);
    });

    // ➤ Route de test POST avec délai : envoie heure client + serveur
    Route::post('/time', function () {
        $timeClient = request()->input('timeClient', 0);
        sleep(2); // Simule un long traitement
        return response()->json(['timeClient' => $timeClient, 'timeServer' => now()]);
    });

    // ➤ Routes API publiques pour lecture (GET index/show)
    Route::apiResource('stories', StoryController::class)->only(['index', 'show']);
    Route::apiResource('chapters', ChapterController::class)->only(['index', 'show']);
    Route::apiResource('choices', ChoiceController::class)->only(['index', 'show']);

    // ➤ Routes protégées pour écrire (POST/PUT/DELETE)
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('stories', StoryController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('chapters', ChapterController::class)->only(['store', 'update', 'destroy']);
        Route::apiResource('choices', ChoiceController::class)->only(['store', 'update', 'destroy']);
    });
});
