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
        <div class="card-tools">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Ajouter un champ</button>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Type</th>
                    <th>Espace réservé</th>
                    <th>Valeur(s)</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                @forelse($event->fields as $field)
                    <tr>
                        <td>{{ $field->label }}</td>
                        <td>{{ $field->type }}</td>
                        <td>{{ $field->placeholder }}</td>
                        <td>
                            @forelse ($field->defaultValues as $key => $defaultValue)
                                <span>{{ $defaultValue->value }}</span>
                                @if($key + 1 < count($field->defaultValues)) , @endif
                            @empty
                                Aucune valeur par défaut
                            @endforelse
                        </td>
                        <td>
                            <button class="btn btn-danger btn_destroy"
                                data-route="{{ route('field.destroy', $field->uid) }}"
                                data-field_label="{{ $field->label }}">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Supprimer</span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Vous n'avez aucun tarif disponible pour cet évènement.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

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
                            @if ($value = old('label')) value="{{ $value }}" @endif required>
                        @error('label')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="placeholder">
                            <span>Espace réservé</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="placeholder" id="placeholder" class="form-control" placeholder="Ex: Entrez votre age" required>
                    </div>
                    <div class="form-group">
                        <label for="type">
                            <span>Type du champ libre</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="" class="d-none">Sélectionner le type du champ</option>
                            @foreach (
                            [
                                'text' => "Champ de type texte",
                                'number' => "Champ de type nombre",
                                'select' => "Champ de sélection"
                            ] as $key => $value
                            )
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
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
    @if (Session::get('add_price_error'))
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