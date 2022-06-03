<?php

use App\Http\Controllers\StaticPagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticPagesController::class, 'home'])->name('home');
Route::get('fonctionnalites', [StaticPagesController::class, 'features'])->name('features');
Route::get('tarifs', [StaticPagesController::class, 'prices'])->name('prices');
Route::get('contact', [StaticPagesController::class, 'contact'])->name('contact');

Route::get('connexion', [StaticPagesController::class, 'login'])->name('app.login');
Route::get('inscription', [StaticPagesController::class, 'register'])->name('app.register');
Route::get('changer_mot_de_passe', [StaticPagesController::class, 'reset'])->name('app.reset');
