@extends('layouts.app-main')
@section('title')
    Modification de l'évènement
@endsection
@section('bigTitle')
    Modification de l'évènement
@endsection

@section('main')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- general form elements -->
            <div class="card">
                <form action="{{ route('event.update', $event->uid) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-4 mx-auto"
                            style="width: fit-content; height: fit-content; color: rgb(202, 202, 202);" id="msStatus">
                            <i class="fa-solid fa-circle mx-1"></i>
                            <i class="fa-solid fa-circle mx-1"></i>
                            <i class="fa-solid fa-circle mx-1"></i>
                            <i class="fa-solid fa-circle mx-1"></i>
                        </div>
                        <div class="d-flex align-items-center" id="steps_container">

                            {{-- SECOND FIELDSET --}}

                            <fieldset class="w-100 d-none">
                                <div class="form-group">
                                    <label for="name">
                                        <span>Titre de l'évènement</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                     type="text" 
                                     id="name" 
                                     name="name"
                                    placeholder="Entrez le titre de votre évènement" class="form-control" 
                                    value="{{ $event->name }}"
                                    required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">
                                        <span>Catégorie de l'évènement</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select
                                     class="form-control" 
                                     name="category_id" 
                                     id="category" 
                                     required>
                                        @foreach ($categories as $category)
                                            <option
                                             value="{{ $category->id }}"
                                             @if ($event->category_id === $category->id)
                                                selected
                                            @endif
                                             >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">
                                        <span>Description de l'évènement</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="mb-4 p-2 bg-info rounded">
                                        <i class="fa-solid fa-circle-info"></i>
                                        <span>Vous pouvez entrer du texte simple ou du code HTML.</span>
                                    </div>
                                    <textarea name="description" id="description" class="form-control" rows="5"
                                        placeholder="Saisissez la description de votre évènement ici" required>{{ $event->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary next_btn" type="button" data-step="1">
                                        <span>Suivant</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </fieldset>

                            {{-- SECOND FIELDSET --}}

                            <fieldset class="w-100 d-none">
                                <div class="form-group">
                                    <label for="start_date_time">
                                        <span>Date et heure de début</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="datetime-local" name="start_date_time" id="start_date_time" class="form-control" value="{{ str_replace(' ', 'T', $event->start_date_time) }}" required>
                                    @error('start_date_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="end_date_time">
                                        <span>Date et heure de fin</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="datetime-local" name="end_date_time" id="end_date_time" class="form-control" value="{{ str_replace(' ', 'T', $event->end_date_time) }}" required>
                                    @error('end_date_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="signup_end_date_time">
                                        <span>Date et heure de clôture des inscriptions</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="datetime-local" name="signup_end_date_time" id="signup_end_date_time" class="form-control" value="{{ str_replace(' ', 'T', $event->signup_end_date_time) }}" required>
                                    @error('signup_end_date_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-5 d-flex justify-content-around align-items-center">
                                    <button class="btn btn-light border prev_btn" type="button" data-step="0">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        <span>Précédent</span>
                                    </button>
                                    <button class="btn btn-primary next_btn" type="button" data-step="2">
                                        <span>Suivant</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </fieldset>

                            {{-- THIRD FIELDSET --}}

                            <fieldset class="w-100 d-none">
                                <div class="form-group">
                                    <label for="country">
                                        <span>Pays</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="country" id="country" required>
                                        <option class="d-none" value="{{ $event->country }}" selected>{{ $event->country }}</option>
                                    </select>
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="city">
                                                <span>Ville</span>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                placeholder="Entrez la ville" value="{{ $event->city }}" required>
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="location">
                                                <span>Lieu de déroulement</span>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="location" id="location" class="form-control"
                                                placeholder="Entrez le lieu de déroulement" value="{{ $event->location }}" required>
                                            @error('location')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="map_html">
                                        <span>Adresse map</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="map_html" id="map_html" cols="30" class="form-control" rows="3"
                                        placeholder="Entrez ici le code HTML copié du lieu de déroulement de votre évènement" required>{{ $event->map_html }}</textarea>
                                    @error('map_html')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-5 d-flex justify-content-around align-items-center">
                                    <button class="btn btn-light border prev_btn" data-step="1" type="button">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        <span>Précédent</span>
                                    </button>
                                    <button class="btn btn-primary next_btn" type="button" data-step="3">
                                        <span>Suivant</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </fieldset>

                            {{-- FOURTH FIELDSET --}}

                            <fieldset class="w-100 d-none">
                                <div class="form-group">
                                    <label for="image">
                                        <span>Visuel de l'évènement(Format 400 x 600)</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                            accept=".png, .jpg, .jpeg">
                                        <label class="custom-file-label" for="customFile">Choisissez votre visuel</label>
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="bg_color">Re-sélectionner la couleur de fond du formulaire (Autre que noir)</label><br>
                                            <label for="bg_color" class="color_picker border rounded"
                                                style="background-color: #eee;">
                                                <input type="color" name="bg_color" id="bg_color">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="text_color">Re-sélectionner la couleur des textes du formulaire</label><br>
                                            <label for="text_color" class="color_picker border rounded"
                                                style="background-color: #000;">
                                                <input type="color" name="text_color" id="text_color">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type">
                                        <span>Déroulement</span>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="type_id" id="type" class="form-control" required>
                                        <option value="" class="d-none">Choisissez le mode de participation</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" @if($event->type_id === $type->id) selected @endif>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        {{$message}}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="counter_active"
                                            id="counter_active" value="1" @if($event->counter_active) checked @endif>
                                        <label class="form-check-label" for="counter_active">Afficher le compteur des
                                            inscriptions</label>
                                    </div>
                                </div>
                                <div class="mt-5 d-flex justify-content-around align-items-center">
                                    <button class="btn btn-light border prev_btn" type="button" data-step="2">
                                        <i class="fa-solid fa-arrow-left"></i>
                                        <span>Précédent</span>
                                    </button>
                                    <input type="submit" class="btn btn-primary px-2" value="Valider la modification">
                                </div>
                            </fieldset>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    </div>
@endsection
@section('additional_script')
    <script src="{{ asset('app_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script src="{{ asset('app_assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('js/event-create.js') }}" type="module"></script>
@endsection
