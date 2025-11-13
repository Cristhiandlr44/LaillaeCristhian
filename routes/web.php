<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\GiftController;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Save the Date
Route::get('/save-the-date', [HomeController::class, 'saveTheDate'])->name('save-the-date');

// História do casal
Route::get('/nossa-historia', [StoryController::class, 'index'])->name('stories.index');
Route::get('/nossa-historia/{story}', [StoryController::class, 'show'])->name('stories.show');

// Local da cerimônia
Route::get('/local', [VenueController::class, 'index'])->name('venues.index');
Route::get('/local/{venue}', [VenueController::class, 'show'])->name('venues.show');

// Lojinha (Lista de presentes)
Route::get('/lojinha', [GiftController::class, 'index'])->name('gifts.index');
Route::get('/lojinha/{gift}', [GiftController::class, 'show'])->name('gifts.show');
Route::post('/lojinha/{gift}/comprar', [GiftController::class, 'purchase'])->name('gifts.purchase');
