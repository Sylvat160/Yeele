@extends('layouts.app-main')

@section('title')
    {{ $event->name }}/Paramètrage des compte de reception de transfert
@endsection
@section('bigTitle')
    {{ $event->name }}/Paramètrage des compte de reception de transfert
@endsection

@section('main')
    @include('extras.success_message')
    @include('extras.warning_message')

    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des comptes</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Ajouter un compte</button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Numéro de téléphone</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($event->payment_codes as $account)
                                <tr>
                                    <td>{{ $account->name }}</td>
                                    <td>
                                        <button class="btn btn-info btn_edit"
                                            data-route="{{ route('event_payment_method.update', $method->uid) }}"
                                            data-payment_method="{{ $method->name }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <span>Modifier</span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn_destroy"
                                            data-route="{{ route('event_payment_method.destroy', $method->uid) }}"
                                            data-payment_method="{{ $method->name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <span>Supprimer</span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Vous n'avez aucun mode de paiement disponible pour cet évènement.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ADD --}}

    <div class="modal fade" id="modal_add" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajout de mode de paiement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('event_payment_method.store') }}" method="post" id="add_modal_form">
                    @csrf
                    <input type="hidden" name="event_uid" value="{{ $event->uid }}" required>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="label">
                                <span>Libellé du mode de paiement</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select name="name" id="label" class="form-control" required>
                                <option value="" class="d-none">Sélectionner une méthode de paiement</option>
                                @foreach ($payment_methods as $method)
                                <option value="{{ $method->name }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
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
                                <span>Libellé du mode de paiement</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select name="name" id="label" class="form-control" required>
                                @foreach ($payment_methods as $method)
                                    <option value="{{ $method->name }}">{{ $method->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
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
                    <h4 class="modal-title">Suppression du mode de paiement</h4>
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
                const label = this.dataset.payment_method
                const route = this.dataset.route

                $(`option[value="${label}"]`).attr('selected', "true")
                $('#edit_modal_form').attr('action', route)
                $('#modal_edit').modal()
            })
        })

        $('.btn_destroy').each(function() {
            $(this).on('click', function() {
                const label = this.dataset.payment_method
                const route = this.dataset.route

                $('#destroy_price_label').html(`"${label}"`)
                $('#destroy_modal_form').attr('action', route)
                $('#modal_destroy').modal()
            })
        })
    </script>
@endsection
