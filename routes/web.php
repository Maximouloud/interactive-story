<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Story;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rediriger vers la seule histoire disponible
    Route::get('/stories', function () {
        return redirect()->route('story.show', ['id' => 1]);
    })->name('stories');

    // Affichage de l’histoire et de ses chapitres/choix
    Route::get('/stories/{id}', function ($id) {
        $story = Story::with('chapters.choices')->findOrFail($id);
        return Inertia::render('StoryDetail', [
            'story' => $story
        ]);
    })->name('story.show');
});

require __DIR__.'/auth.php';

