<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    $user = Auth::user();
    $chapterToLoad = $user->current_chapter_id
        ? $story->chapters->firstWhere('id', $user->current_chapter_id)
        : $story->chapters->first();

    return Inertia::render('StoryDetail', [
        'story' => $story,
        'startingChapterId' => $chapterToLoad->id,
    ]);
})->middleware(['auth'])->name('story.show');
});

//syttème pour sauvegarde du chapitre actuel
Route::post('/save-progress', function () {
    $user = Auth::user();
    $chapterId = request('chapter_id');
    $user->current_chapter_id = $chapterId;
    $user->save();

    return response()->json(['ok' => true]);
})->middleware('auth');

require __DIR__.'/auth.php';

