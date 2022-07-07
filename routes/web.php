<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppControllers\AuthController;
use App\Http\Controllers\AppControllers\BulkMailController;
use App\Http\Controllers\AppControllers\CommandController;
use App\Http\Controllers\AppControllers\EventController;
use App\Http\Controllers\AppControllers\EventPaymentMethodController;
use App\Http\Controllers\AppControllers\EventPriceController;
use App\Http\Controllers\AppControllers\FieldController;
use App\Http\Controllers\AppControllers\ParticipantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StaticPagesController;

//WEBSITE

Route::get('/', [StaticPagesController::class, 'home'])->name('website.home');
Route::get('fonctionnalites', [StaticPagesController::class, 'features'])->name('website.features');
Route::get('tarifs', [StaticPagesController::class, 'prices'])->name('website.prices');
Route::get('contact', [ContactController::class, 'index'])->name('website.contact');
Route::post('send', [ContactController::class, 'send'])->name('website.contact.send');
Route::get('reload-captcha', [ContactController::class, 'reloadCaptcha']);
Route::get('politique_de_confidentialite', [StaticPagesController::class, 'policy'])->name('website.policy');
Route::get('termes_et_conditions_d_utilisation', [StaticPagesController::class, 'terms'])->name('website.terms');

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
    Route::get('/email/verification/{hash}', [AuthController::class, 'email_verification'])->middleware('signed')->name('verification.verify_email');
    Route::post('/renvoyer_le_mail', [AuthController::class, 'resend_verification_mail'])->name('email.resend_verification_mail');
    Route::get('/mail_renvoyé', [AuthController::class, 'resent_mail'])->name('resent_mail');
    Route::post('logout', [AuthController::class, 'logout'])->name('app.logout');
});

//SIGNED AND AUTHORIZED CLIENTS ROUTES

Route::prefix('app')->middleware(['auth', 'client', 'verified'])->group(function() {
    Route::get('/', [AuthController::class, 'home'])->name('app.home');
    Route::get('modification-info', [AuthController::class, 'showEditPage'])->name('app.edit-user-info-page');
    Route::get('update-info', [AuthController::class, 'editData'])->name('app.edit-info');
    Route::resource('event', EventController::class);
    Route::resource('command', CommandController::class)->except('show', 'destroy');
    Route::get('current_event/{event_uid}/event_price', [EventPriceController::class, 'index'])->name('event_price.index');
    Route::resource('event_price', EventPriceController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('current_event/{event_uid}/event_payment_method', [EventPaymentMethodController::class, 'index'])->name('event_payment_method.index');
    Route::resource('event_payment_method', EventPaymentMethodController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('current_event/{event_uid}/field', [FieldController::class, 'index'])->name('field.index');
    Route::resource('field', FieldController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('current_event/{even_uid}/participants', [ParticipantController::class, 'index'])->name('event_participants.list');
    Route::get('current_event/{event_uid}/creation_formulaire', [FormController::class, 'formbuilder_editor'])->name('event.new_form');
    Route::post('build_formbuilder', [FormController::class, 'build_form']);
    Route::post('edit_formbuilder', [FormController::class, 'update_form']);
    Route::get('current_event/{event_uid}/modification_formulaire', [FormController::class, 'edit_form'])->name('event.edit_form');
    Route::get('form_built/{event_uid}', function($event_uid) {
        return redirect()->route('event.show', $event_uid)->with('success', "Le formulaire a été créé.");
    });
    Route::get('form_edit/{event_uid}', function($event_uid) {
        return redirect()->route('event.show', $event_uid)->with('success', "Le formulaire a été modifié.");
    });

    Route::get('/current_event/{event_uid}/bulkmailing', [BulkMailController::class, 'index'])->name('app.bulkmailing_index');
    Route::post('send_bulkmail', [BulkMailController::class, 'send'])->name('bulkmail.send');
});

//PARTICIPANT REGISTRATION ROUTES

Route::get('fiche_inscription/{event_uid}', [FormController::class, 'index'])->name('show_event_form');
Route::get('formulaire/{event_uid}', [FormController::class, 'create'])->name('form');
Route::post('soumettre', [FormController::class, 'register'])->name('submit_form');
Route::get('inscription_de_participant_reussi', [FormController::class, 'registering_end'])->name('registering_end');