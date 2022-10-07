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
                                <th>Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($event->custom['paymentAccounts'] as $account)
                                <tr>
                                    <td>{{ $account->receiver_lastname }}</td>
                                    <td>{{ $account->event_payment_method->name }}</td>
                                    <td>{{ $account->receiver_firstname }}</td>
                                    <td>{{ $account->receiver_phone }}</td>
                                    <td>
                                        <button class="btn btn-danger btn_destroy"
                                            data-route="{{ route('payment_account.destroy', $account->uid) }}"
                                            data-method="{{ $account->event_payment_method->name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <span>Supprimer</span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Vous n'avez aucun compte de paiement disponible pour cet évènement.
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
                    <h4 class="modal-title">Ajout de compte de paiement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('payment_account.store') }}" method="post" id="add_modal_form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="event_payment_method">
                                <span>Le mode de paiement</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select name="event_payment_method" id="event_payment_method" class="form-control" required>
                                <option value="" class="d-none">Sélectionner un mode de paiement</option>
                                @foreach ($event->custom['payMethWithoutPayAcc'] as $pmwpa)
                                    <option value="{{ $pmwpa->uid }}">{{ $pmwpa->name }}</option>
                                @endforeach
                            </select>

                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname">
                                <span>Nom du bénéficiaire</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Ex: Traoré, Sana, ..." required>
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="firstname">
                                <span>Prénom du bénéficiaire</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Ex: Razack, Nathan ..." required>
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                <span>Numéro du bénéficiaire</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" id="phone" name="phone" class="form-control" placeholder="(+226)XXXXXXXX" required>
                            @error('phone')
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

    {{-- DELETE --}}

    <div class="modal fade" id="modal_destroy" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Suppression du compte paiement</h4>
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
                            <p>Vous êtes sur le point de supprimer le compte du mode de paiement <strong id="destroy_label"></strong>? Cette action
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
                const method = this.dataset.method
                const route = this.dataset.route

                $('#destroy_label').html(`"${method}"`)
                $('#destroy_modal_form').attr('action', route)
                $('#modal_destroy').modal()
            })
        })
    </script>
@endsection
