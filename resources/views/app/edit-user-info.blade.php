@extends('layouts.app-main')
@section('title')
    Modification des informations
@endsection
@section('bigTitle')
    Modification des informations
@endsection

@section('main')
    {{-- STATUS --}}
    @include('extras.success_message')
    @include('extras.danger_message')
    {{-- ENDSTATUS --}}

    <div class="row justify-content-center">

        {{-- FIRSTNAME & LASTNAME --}}

        <div class="col-12 col-md-6">
            <form action="#">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="lastname">
                                <span>Nom</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="lastname" id="lastname" class="form-control"
                                placeholder="Entrez votre nom" value="{{ Auth::user()->lastname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">
                                <span>Prénom</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="firstname" id="firstname" class="form-control"
                                placeholder="Entrez votre prénom" value="{{ Auth::user()->firstname }}" required>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Envoyer les modifications</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- EMAIL AND PHONE --}}

        <div class="col-12 col-md-6">
            <div class="card">
                <form action="#">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">
                                <span>Email</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Entrez votre adresse email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                <span>Téléphone</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Ex: (+226) XX-XX-XX-XX" value="{{ Auth::user()->email }}" required>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Envoyer les modifications</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ORGANIZATION AND GENDER --}}

        <div class="col-12 col-md-6">
            <div class="card">
                <form action="">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="organization">
                                <span>Organisme</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="organization" id="organization" class="form-control"
                                placeholder="Votre organisme" value="{{ Auth::user()->organization }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">
                                <span>Genre</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select name="gender" id="gender" class="form-control" required>
                                @foreach (["Masculin", "Féminin"] as $gender)
                                    <option value="{{ $gender }}" @if($gender === Auth::user()->gender) selected @endif>{{ $gender }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Envoyer les modifications</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- PASSWORD --}}

        <div class="col-12 col-md-6">
            <form action="#">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="password">
                                <span>Mot de passe</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Entrez le nouveau mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">
                                <span>Confirmation mot de passe</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                placeholder="Confirmez votre mot de passe" required>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Envoyer les modifications</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
