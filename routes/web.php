<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppControllers\AuthController;
use App\Http\Controllers\AppControllers\CommandController;
use App\Http\Controllers\AppControllers\EventController;
use App\Http\Controllers\AppControllers\EventPaymentMethodController;
use App\Http\Controllers\AppControllers\EventPriceController;
use App\Http\Controllers\AppControllers\FieldController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StaticPagesController;

//WEBSITE

Route::get('/', [StaticPagesController::class, 'home'])->name('website.home');
Route::get('fonctionnalites', [StaticPagesController::class, 'features'])->name('website.features');
Route::get('tarifs', [StaticPagesController::class, 'prices'])->name('website.prices');
Route::get('contact', [StaticPagesController::class, 'contact'])->name('website.contact');

//AUTHENTICATION

Route::get('connexion', [StaticPagesController::class, 'login'])->name('login');
Route::post('connexion', [AuthController::class, 'login'])->name('app.login');
Route::get('inscription/{plan?}', [StaticPagesController::class, 'register'])->name('register');
Route::get('changer_mot_de_passe', [StaticPagesController::class, 'reset'])->name('reset');
Route::post('changer_mot_de_passe', [AuthController::class, 'reset_request'])->name('reset_request');
Route::get('mail_de_modification_envoyé', [AuthController::class, 'reset_mail_sent'])->name('reset_mail_sent');
Route::get('nouveau_mot_de_passe/{token}', [AuthController::class, 'new_password'])->name('password.reset');
Route::post('modifier_mot_de_passe', [AuthController::class, 'update_password'])->name('password.update');
Route::post('inscription', [AuthController::class, 'register'])->name('app.register');

//VERIFICATION

Route::middleware('auth')->group(function() {
    Route::get('verification_email', [StaticPagesController::class, 'verify'])->name('verification.verify');
    Route::get('/email/verification/{id}/{hash}', [AuthController::class, 'email_verification'])->middleware('signed')->name('verification.verify_email');
    Route::post('/renvoyer_le_mail', [AuthController::class, 'resend_verification_mail'])->name('email.resend_verification_mail');
    Route::get('/mail_renvoyé', [AuthController::class, 'resent_mail'])->name('resent_mail');
    Route::post('logout', [AuthController::class, 'logout'])->name('app.logout');
});

//SIGNED AND AUTHORIZED CLIENTS ROUTES

Route::prefix('app')->middleware(['auth', 'client', 'verified'])->group(function() {
    Route::get('/', [AuthController::class, 'home'])->name('app.home');
    Route::resource('event', EventController::class);
    Route::resource('command', CommandController::class)->except('show', 'destroy');
    Route::get('current_event/{event_uid}/event_price', [EventPriceController::class, 'index'])->name('event_price.index');
    Route::resource('event_price', EventPriceController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('current_event/{event_uid}/event_payment_method', [EventPaymentMethodController::class, 'index'])->name('event_payment_method.index');
    Route::resource('event_payment_method', EventPaymentMethodController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('current_event/{event_uid}/field', [FieldController::class, 'index'])->name('field.index');
    Route::resource('field', FieldController::class)->except(['index', 'create', 'show', 'edit']);
});

//PARTICIPANT REGISTRATION ROUTES

Route::get('/formulaire/{event_uid}', [FormController::class, 'index'])->name('form');