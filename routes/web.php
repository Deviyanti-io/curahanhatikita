<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurahanController;
use App\Http\Controllers\KataMutiaraController;
use App\Http\Controllers\DailyInsightController;
use App\Http\Controllers\MoodController; // Pastikan ini sudah di-import
use Illuminate\Support\Facades\Route;

// Guest Routes
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth.session'])->group(function () {
    
    // Kata Mutiara Routes
    Route::get('/kata-mutiara', [KataMutiaraController::class, 'index'])->name('mutiara');
    Route::post('/kata-mutiara', [KataMutiaraController::class, 'store'])->name('mutiara.store');
    Route::put('/kata-mutiara/{kataMutiara}', [KataMutiaraController::class, 'update'])->name('mutiara.update');
    Route::delete('/kata-mutiara/{kataMutiara}', [KataMutiaraController::class, 'destroy'])->name('mutiara.destroy');
    
    // Daily Insight
    Route::get('/daily-insight', [DailyInsightController::class, 'index'])->name('insight');
    
    // Curahan Hati & Interaksi
    Route::resource('curahan', CurahanController::class);
    Route::post('/curahan/{curahan}/like', [CurahanController::class, 'toggleLike'])->name('curahan.like');
    Route::post('/curahan/{curahan}/comment', [CurahanController::class, 'addComment'])->name('curahan.comment');
    Route::delete('/comment/{comment}', [CurahanController::class, 'deleteComment'])->name('comment.delete');
    
    // Mood Tracker Routes (Baru Ditambahkan)
    Route::get('/mood-tracker', [MoodController::class, 'index'])->name('mood.index');
    Route::post('/mood-tracker', [MoodController::class, 'store'])->name('mood.store');
    Route::delete('/mood-tracker/{mood}', [MoodController::class, 'destroy'])->name('mood.destroy');
    
    // Playlist
    Route::get('/playlist', function () {
        return view('playlist');
    })->name('playlist');
});