@extends('layouts.app-main')
@section('title') {{ $event->name }}/Creation du formulaire @endsection
@section('bigTitle') {{ $event->name }}/Creation du formulaire @endsection

@section('main')
@include('extras.success_message')
@include('extras.danger_message')

<div class="mb-4 p-3 rounded" style="background-color: #ebbd35;">
    <div>
      <i class="fa-solid fa-circle-exclamation"></i>
      <span>Les champs <strong>Nom</strong>, <strong>Prénom</strong>, <strong>Civilité</strong>, <strong>Email</strong> et <strong>Téléphone</strong> existent déjà par défaut. Vous ne devez pas les créer.</span>
    </div>
</div>

<div class="card">
    <input type="hidden" name="form_uid" value="{{ $form->uid }}" required>
    <div class="card-body">
        <div id="formbuilder_container"></div>
    </div>
</div>

@endsection

@section('additional_script')
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script src="{{ asset('js/formbuilder.edit.js') }}"></script>
@endsection