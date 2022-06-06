<?php

use App\Http\Controllers\AppControllers\EventController;
use App\Http\Controllers\StaticPagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticPagesController::class, 'home'])->name('website.home');
Route::get('fonctionnalites', [StaticPagesController::class, 'features'])->name('website.features');
Route::get('tarifs', [StaticPagesController::class, 'prices'])->name('website.prices');
Route::get('contact', [StaticPagesController::class, 'contact'])->name('website.contact');

Route::get('connexion', [StaticPagesController::class, 'login'])->name('app.login');
Route::get('inscription', [StaticPagesController::class, 'register'])->name('app.register');
Route::get('changer_mot_de_passe', [StaticPagesController::class, 'reset'])->name('app.reset');

Route::prefix('app')->group(function() {
    Route::get('/', function() {
        return view('app.home');
    });
    Route::resource('event', EventController::class);
});