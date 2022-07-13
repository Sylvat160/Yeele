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
            <form action="{{ route('app.user-update-fullname') }}" method="POST">
                @csrf
                <input type="hidden" name="user_uid" value="{{ Auth::user()->uid }}" required>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="lastname">
                                <span>Nom</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="lastname" id="lastname" class="form-control"
                                placeholder="Entrez votre nom" value="{{ Auth::user()->lastname }}" required>
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="firstname">
                                <span>Prénom</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="firstname" id="firstname" class="form-control"
                                placeholder="Entrez votre prénom" value="{{ Auth::user()->firstname }}" required>
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                <form action="{{ route('app.user-update-email_phone') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_uid" value="{{ Auth::user()->uid }}" required>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email">
                                <span>Email</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Entrez votre adresse email" value="{{ Auth::user()->email }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                <span>Téléphone</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Ex: (+226) XX-XX-XX-XX" value="{{ Auth::user()->phone }}" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                <form action="{{ route('app.user-update-org_gender') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_uid" value="{{ Auth::user()->uid }}" required>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="organization">
                                <span>Organisme</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="organization" id="organization" class="form-control"
                                placeholder="Votre organisme" value="{{ Auth::user()->organization }}" required>
                            @error('organization')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">
                                <span>Genre</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select name="gender" id="gender" class="form-control" required>
                                @foreach (['Masculin', 'Féminin'] as $gender)
                                    <option value="{{ $gender }}" @if ($gender === Auth::user()->gender) selected @endif>
                                        {{ $gender }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
            <form action="{{ route('app.user-update-password') }}" method="POST">
                @csrf
                <input type="hidden" name="user_uid" value="{{ Auth::user()->uid }}" required>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="password">
                                <span>Mot de passe</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Entrez le nouveau mot de passe" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">
                                <span>Confirmation mot de passe</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                placeholder="Confirmez votre mot de passe" required>
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
