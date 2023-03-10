<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\AppControllers\AuthController;
use App\Http\Controllers\AppControllers\AdminController;
use App\Http\Controllers\AppControllers\EventController;
use App\Http\Controllers\AppControllers\FieldController;
use App\Http\Controllers\AppControllers\CommandController;
use App\Http\Controllers\AppControllers\BulkMailController;
use App\Http\Controllers\AppControllers\EventPriceController;
use App\Http\Controllers\AppControllers\ParticipantController;
use App\Http\Controllers\AppControllers\PaymentAccountController;
use App\Http\Controllers\AppControllers\EventPaymentMethodController;
use App\Http\Middleware\Admin;
use App\Models\Event;

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
Route::get('mail_de_modification_envoy??', [AuthController::class, 'reset_mail_sent'])->name('reset_mail_sent');
Route::get('nouveau_mot_de_passe/{token}', [AuthController::class, 'new_password'])->name('password.reset');
Route::post('modifier_mot_de_passe', [AuthController::class, 'update_password'])->name('password.update');
Route::post('inscription', [AuthController::class, 'register'])->name('app.register');

//VERIFICATION

Route::middleware('auth')->group(function() {
    Route::get('verification_email', [StaticPagesController::class, 'verify'])->name('verification.verify');
    Route::get('email/verification/{hash}', [AuthController::class, 'email_verification'])->middleware('signed')->name('verification.verify_email');
    Route::post('renvoyer_le_mail', [AuthController::class, 'resend_verification_mail'])->name('email.resend_verification_mail');
    Route::get('mail_renvoy??', [AuthController::class, 'resent_mail'])->name('resent_mail');
    Route::post('logout', [AuthController::class, 'logout'])->name('app.logout');
});

//ADMIN PANEL
Route::prefix('admin')->middleware(['auth', 'admin'  , 'verified'])->group(function(){
    Route::get('/evenement/en_cours', [AdminController::class , 'currentEvents'])->name('events-current');
    Route::get('/evenement/termines', [AdminController::class , 'endEvents'])->name('events-end');
    Route::get('/evenement/a_venir', [AdminController::class , 'upcomingEvents'])->name('events-upcoming');
    Route::get('/utilisateurs', [AdminController::class, 'index'])->name('users_list');
    Route::get('/evenements', [AdminController::class, 'events'])->name('all.events');
    Route::get('/utilisateur/{id}', [AdminController::class, 'userDetails'])->name('user.details');
    Route::get('/commandes/{id}', [AdminController::class, 'userOrders'])->name('user.orders');
    Route::get('/evenement/{id}', [AdminController::class, 'userEvents'])->name('user.events');
    
});

//SIGNED AND AUTHORIZED CLIENTS ROUTES

Route::prefix('app')->middleware(['auth', 'client', 'verified'])->group(function() {
    Route::get('/', [AuthController::class, 'home'])->name('app.home');
    Route::get('modification-info', [AuthController::class, 'showEditPage'])->name('app.edit-user-info-page');
    Route::post('update-fullname', [AuthController::class, 'updateFullname'])->name('app.user-update-fullname');
    Route::post('update-email_phone', [AuthController::class, 'updateEmailPhone'])->name('app.user-update-email_phone');
    Route::post('update-org_gender', [AuthController::class, 'updateOrgGender'])->name('app.user-update-org_gender');
    Route::post('update-password', [AuthController::class, 'updatePassword'])->name('app.user-update-password');
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
        return redirect()->route('event.show', $event_uid)->with('success', "Le formulaire a ??t?? cr????.");
    });
    Route::get('form_edit/{event_uid}', function($event_uid) {
        return redirect()->route('event.show', $event_uid)->with('success', "Le formulaire a ??t?? modifi??.");
    });

    Route::get('current_event/{event_uid}/bulkmailing', [BulkMailController::class, 'index'])->name('app.bulkmailing_index');
    Route::post('send_bulkmail', [BulkMailController::class, 'send'])->name('bulkmail.send');
    Route::get('current_event/{event_uid}/participants-edit-list', [ParticipantController::class, 'editList'])->name('participants-edit-list');
    Route::get('participant-edit/{participant_uid}/{event_uid}', [ParticipantController::class, 'edit'])->name('participant.edit');
    Route::post('participant-delete', [ParticipantController::class, 'destroy'])->name('participant.remove');
    Route::post('participant-update', [ParticipantController::class, 'update'])->name('participant.update');

    // EDIT PARTICIPANT PAYMENTS ROUTES
    Route::get('current_event/{event_uid}/participants-payment-edit-list', [ParticipantController::class, 'paymentEditList'])->name('participants-payment-edit-list');
    Route::get('participant-payment-edit/{participant_uid}/{event_uid}', [ParticipantController::class, 'participantEditPayment'])->name('participant.payment.edit');
    Route::post('participant-payment-update', [ParticipantController::class, 'paymentUpdate'])->name('participant.payment.update');



    //PRICE SETTINGS ROUTES

    Route::post('update_multi_select_status', [App\Http\Controllers\AppControllers\PriceSettingController::class, 'updateMultiSelectStatus'])->name('updateMultiSelectStatus');
    Route::post('update_quantity_status', [App\Http\Controllers\AppControllers\PriceSettingController::class, 'updateQuantityStatus'])->name('updateQuantityStatus');

    //PAYMENT ACCOUNT SETTINGS

    Route::get('current_event/{event_uid}/comptes_paiement', [PaymentAccountController::class, 'create'])->name('payment_account_create');
    Route::resource('payment_account', PaymentAccountController::class)->except(['index', 'create', 'show', 'edit', 'update']);
});
 
//PARTICIPANT REGISTRATION ROUTES

Route::get('fiche_inscription/{event_uid}', [FormController::class, 'index'])->name('show_event_form');
Route::get('formulaire/{event_uid}', [FormController::class, 'create'])->name('form');
Route::post('soumettre', [FormController::class, 'register'])->name('submit_form');
Route::get('inscription_de_participant_reussi', [FormController::class, 'registering_end'])->name('registering_end');
Route::get('page_modification/{participant_uid}/{event_uid}', [ParticipantController::class, 'participantUpdatePage'])->name('participant-update-page');
Route::post('modifier_donnees', [ParticipantController::class, 'participantUpdate'])->name('participant-update-data');
Route::get('donnees_modifiees/{event_uid}', [ParticipantController::class, 'participantDataUpdated'])->name('participant-data-updated');
Route::get('verification_lien/{eventId}/{participantEmail}', [ParticipantController::class, 'checkLinkCount'])->name('participant_link_checking');
Route::get('/probleme_durant_verification', function() {
    return view('app.link_check_fail');
})->name('forbidden_page');

//SIGNATURE ELECTRONIQUE

Route::get('signature_electronique', [FormController::class, 'electronic_signature_desc'])->name('electronic_signature_post');
Route::get('formulaire_signature_electronique', [FormController::class, 'electronic_signature_index'])->name('electronic_signature_form');
Route::post('soumission_du_questionnaire', [FormController::class, 'electronic_signature_submit'])->name('signature_form_submit');
Route::get('formulaire_signature_electronique_envoy??', [FormController::class, 'electronic_signature_done'])->name('signature_form_sent');
Route::get('donnees_questionnaire_signature_collectees', [FormController::class, 'electronic_signature_data']);

//Test 

Route::get('test', function () {
    return view('app.pdf');
});
Route::get('payementTest', function () {
    return view('app.payment-test');
});

