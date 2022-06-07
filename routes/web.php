<?php

use App\Http\Controllers\AppControllers\AuthController;
use App\Http\Controllers\AppControllers\EventController;
use App\Http\Controllers\StaticPagesController;
use Illuminate\Support\Facades\Route;

//WEBSITE

Route::get('/', [StaticPagesController::class, 'home'])->name('website.home');
Route::get('fonctionnalites', [StaticPagesController::class, 'features'])->name('website.features');
Route::get('tarifs', [StaticPagesController::class, 'prices'])->name('website.prices');
Route::get('contact', [StaticPagesController::class, 'contact'])->name('website.contact');

//AUTHENTICATION

Route::get('connexion', [StaticPagesController::class, 'login'])->name('login');
Route::get('inscription/{plan?}', [StaticPagesController::class, 'register'])->name('register');
Route::get('changer_mot_de_passe', [StaticPagesController::class, 'reset'])->name('reset');
Route::post('register', [AuthController::class, 'register'])->name('app.register');

//VERIFICATION

Route::middleware('auth')->group(function() {
    Route::get('verification_email', [StaticPagesController::class, 'verify'])->name('verification.verify');
    Route::get('/email/verification/{id}/{hash}', [AuthController::class, 'email_verification'])->middleware('signed');
    Route::post('/renvoyer_le_mail', [AuthController::class, 'resend_verification_mail'])->name('email.resend_verification_mail');
    Route::get('/mail_renvoyé', [AuthController::class, 'resent_mail'])->name('resent_mail');
});

//SIGNED AND AUTHORIZED USERS ROUTES

Route::prefix('app')->middleware(['auth', 'client'])->group(function() {
    Route::get('/', [AuthController::class, 'home'])->name('app.home');
    Route::resource('event', EventController::class);
});