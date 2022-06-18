@extends('layouts.app-main')
@section('title')
    {{ $event->name }}/Champs libre
@endsection
@section('bigTitle')
    {{ $event->name }}/Champs libre
@endsection

@section('main')
@include('extras.success_message')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des valeurs</h3>
        <div class="card-tools">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Ajouter un champ libre</button>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Valeur</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($event->fields as $field)
                    <tr>
                        <td>{{ $field->name }}</td>
                        <td>{{ $field->value }}</td>
                        <td>
                            <button class="btn btn-danger btn_destroy"
                                data-route="{{ route('field.destroy', $field->uid) }}">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Supprimer</span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Vous n'avez aucune valeur pour le champ libre</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal_destroy" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Suppression d'une valeur du champ libre</h4>
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
                            <p>Vous êtes sur le point de supprimer une des valeurs du champ libre. Cette action
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
                        <label for="value">
                            <span>Valeur</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="value" id="value" class="form-control" placeholder="Entrez une valeur" @if($value = old('value')) value="{{ $value }}" @endif required>
                        @error('value')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
@endsection
@section('additional_script')
<script>
    @if (Session::get('error'))
        $('#modal_add').modal()
    @endif

    $('.btn_destroy').each(function() {
        $(this).on('click', function() {
            $('#destroy_modal_form').attr('action', this.dataset.route)
            $('#modal_destroy').modal()
        })
    })
</script>
@endsection