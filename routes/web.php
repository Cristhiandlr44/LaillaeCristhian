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
Route::get('/lojinha/{gift}/pagamento', [GiftController::class, 'payment'])->name('gifts.payment');
Route::post('/lojinha/{gift}/processar-pagamento', [GiftController::class, 'processPayment'])->name('gifts.process-payment');
Route::get('/lojinha/{gift}/pagamento/sucesso', [GiftController::class, 'paymentSuccess'])->name('gifts.payment.success');
Route::get('/lojinha/{gift}/pagamento/falha', [GiftController::class, 'paymentFailure'])->name('gifts.payment.failure');
Route::get('/lojinha/{gift}/pagamento/pendente', [GiftController::class, 'paymentPending'])->name('gifts.payment.pending');
Route::post('/lojinha/pagamento/webhook', [GiftController::class, 'paymentWebhook'])->name('gifts.payment.webhook');
Route::post('/lojinha/{gift}/comprar', [GiftController::class, 'purchase'])->name('gifts.purchase');

// RSVP
Route::post('/rsvp', [HomeController::class, 'submitRsvp'])->name('rsvp.submit');
