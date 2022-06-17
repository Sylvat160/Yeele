@extends('layouts.app-main')
@section('title')
    {{ $event->name }}/Champs libres
@endsection
@section('bigTitle')
    {{ $event->name }}/Champs libres
@endsection

@section('main')
@include('extras.success_message')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des champs libres</h3>
        @if(!$event->field)
        <div class="card-tools">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Ajouter un champ libre</button>
        </div>
        @endif
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Nom</th>
                    <th>Valeur 1</th>
                    <th>Valeur 2</th>
                    <th>Valeur 3</th>
                    <th>Valeur 4</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                @if($event->field)
                    <tr>
                        <td>{{ $event->field->label }}</td>
                        <td>{{ $event->field->name }}</td>
                        <td>{{ $event->field->value1 }}</td>
                        <td>{{ $event->field->value2 }}</td>
                        <td>{{ $event->field->value3 }}</td>
                        <td>{{ $event->field->value4 }}</td>
                        <td>
                            <button class="btn btn-danger btn_destroy"
                                data-route="{{ route('field.destroy', $event->field->uid) }}"
                                data-field_label="{{ $event->field->name }}">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Supprimer</span>
                            </button>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@if(!$event->field)

{{-- ADD --}}

<div class="modal fade" id="modal_add" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajout de Champ libre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('field.store') }}" method="post" id="add_modal_form">
                @csrf
                <input type="hidden" name="event_uid" value="{{ $event->uid }}" required>
                <div class="modal-body" id="add_modal_form_body">
                    <div class="form-group">
                        <label for="label">
                            <span>Libellé du champ</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="label" id="label" class="form-control" placeholder="Ex: Age, nombre de place, ..."
                            @if($value = old('label')) value="{{ $value }}" @endif required>
                        @error('label')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">
                            <span>Nom du champ libre</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Entrez le nom du champ" @if($value = old('name')) value="{{ $value }}" @endif required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="value1">
                            <span>Valeur 1</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="value1" id="value1" class="form-control" placeholder="Entrez la valeur 1" @if($value = old('value1')) value="{{ $value }}" @endif required>
                        @error('value1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="value2">
                            <span>Valeur 2</span>
                        </label>
                        <input type="text" name="value2" id="value2" class="form-control" placeholder="Entrez la valeur 2" @if($value = old('value2')) value="{{ $value }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="value3">
                            <span>Valeur 3</span>
                        </label>
                        <input type="text" name="value3" id="value3" class="form-control" placeholder="Entrez la valeur 3" @if($value = old('value3')) value="{{ $value }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="value4">
                            <span>Valeur 4</span>
                        </label>
                        <input type="text" name="value4" id="value4" class="form-control" placeholder="Entrez la valeur 4" @if($value = old('value4')) value="{{ $value }}" @endif>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger modal_form_submit_btn">Ajouter</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endif

{{-- DELETE --}}

<div class="modal fade" id="modal_destroy" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression du champ libre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post" id="destroy_modal_form">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <div class="text-danger">
                        <h1>Attention!</h1>
                        <p>Vous êtes sur le point de supprimer le champ libre "<strong id="destroy_field_label"></strong>". Cette action
                            est irréversible. Êtes vous sûr de vouloir continuer?</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-danger modal_form_submit_btn">Oui</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('additional_script')
<script>
    @if (Session::get('error'))
        $('#modal_add').modal()
    @endif

    $('.btn_destroy').each(function() {
        $(this).on('click', function() {
            $('#destroy_modal_form').attr('action', this.dataset.route)
            $('#destroy_field_label').html(this.dataset.field_label)
            $('#modal_destroy').modal()
        })
    })
</script>
<script src="{{ asset('js/field.js') }}"></script>
@endsection