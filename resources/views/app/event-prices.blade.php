@extends('layouts.app-main')
@section('title')
    Tarifs de l'évènement "{{ $event->name }}"
@endsection
@section('bigTitle')
    Tarifs de l'évènement "{{ $event->name }}"
@endsection

@section('main')
    @include('extras.success_message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des tarifs</h3>
            <div class="card-tools">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Ajouter un tarif</button>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Libellé</th>
                        <th>Prix</th>
                        <th>Modification</th>
                        <th>Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($event->eventPrices as $eventPrice)
                        <tr>
                            <td>{{ $eventPrice->label }}</td>
                            <td>{{ $eventPrice->value }} FCFA</td>
                            <td>
                                <button class="btn btn-info btn_edit"
                                    data-route="{{ route('event_price.update', $eventPrice->uid) }}"
                                    data-price_label="{{ $eventPrice->label }}"
                                    data-price_value="{{ $eventPrice->value }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Modifier</span>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn_destroy"
                                    data-route="{{ route('event_price.destroy', $eventPrice->uid) }}"
                                    data-price_label="{{ $eventPrice->label }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                    <span>Supprimer</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
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
                    <h4 class="modal-title">Ajout de tarif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('event_price.store') }}" method="post" id="add_modal_form">
                    @csrf
                    <input type="hidden" name="event_uid" value="{{ $event->uid }}" required>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="label">
                                <span>Libellé du tarif</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="label" id="label" class="form-control" placeholder="Ex: Simple, VIP"
                                @if ($value = old('label')) value="{{ $value }}" @endif required>
                            @error('label')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value">
                                <span>Valeur du tarif</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="value" id="value" class="form-control" placeholder="Ex: 15000"
                                @if ($value = old('value')) value="{{ $value }}" @endif required>
                            @error('value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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

    {{-- EDIT --}}

    <div class="modal fade" id="modal_edit" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modification de tarif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="post" id="edit_modal_form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="event_uid" value="{{ $event->uid }}" required>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_label">
                                <span>Libellé du tarif</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="label" id="edit_label" class="form-control"
                                placeholder="Ex: Simple, VIP" required>
                            @error('label')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_value">
                                <span>Valeur du tarif</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="value" id="edit_value" class="form-control" placeholder="Ex: 15000"
                                required>
                            @error('value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-danger modal_form_submit_btn">Modifier</button>
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
                    <h4 class="modal-title">Suppression du tarif</h4>
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
                            <p>Vous êtes sur le point de supprimer <strong id="destroy_price_label"></strong>. Cette action
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

        $('.btn_edit').each(function() {
            $(this).on('click', function() {
                const label = this.dataset.price_label
                const value = this.dataset.price_value
                const route = this.dataset.route

                $('#edit_label').attr('value', label)
                $('#edit_value').attr('value', value)
                $('#edit_modal_form').attr('action', route)
                $('#modal_edit').modal()
            })
        })

        $('.btn_destroy').each(function() {
            $(this).on('click', function() {
                const label = this.dataset.price_label
                const route = this.dataset.route

                $('#destroy_price_label').html(`"${label}"`)
                $('#destroy_modal_form').attr('action', route)
                $('#modal_destroy').modal()
            })
        })
    </script>
@endsection
