<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestreamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login/restream', [RestreamController::class, 'redirectToProvider'])->name('login.restream');;
Route::get('/callback', [RestreamController::class, 'handleProviderCallback']);
Route::get('/platforms', [RestreamController::class, 'getAllPlatforms']);
Route::get('/get-stream-key', [RestreamController::class, 'getStreamKey']);
Route::get('/get-ingest-server', [RestreamController::class, 'getIngestServer']);
Route::get('/get-profile', [RestreamController::class, 'getProfile']);
Route::get('/show-stream', [RestreamController::class, 'showStream']);

require __DIR__.'/auth.php';
