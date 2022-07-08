@extends('layouts.app-main')
@section('title')
    {{ $event->name }}/Liste des inscrits
@endsection
@section('bigTitle')
    {{ $event->name }}/Liste des inscrits
@endsection

@section('main')
    {{-- SUCCESS MESSAGE --}}
    @include('extras.success_message')
    {{-- END SUCCESS MESSAGE --}}

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mt-1">Liste des inscrits</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body" style="overflow-x: scroll;">
            <div id="data_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <table id="usersData" class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="Plan" rowspan="1" colspan="1"
                                        aria-sort="Plan" aria-label="Nom: activate to sort column descending">Nom
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="Duration" rowspan="1"
                                        colspan="1" aria-label="Prenom: activate to sort column ascending">Prenom</th>
                                    <th class="sorting" tabindex="0" aria-controls="Status" rowspan="1" colspan="1"
                                        aria-label="Civilité: activate to sort column ascending">Civilité</th>
                                    <th class="sorting" tabindex="0" aria-controls="Price" rowspan="1" colspan="1"
                                        aria-label="Email: activate to sort column ascending">Adresse e-mail</th>
                                    <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1"
                                        colspan="1" aria-label="Téléphone: activate to sort column ascending">Téléphone
                                    </th>
                                    @if ($event->eventPrices->count())
                                        <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1"
                                            colspan="1" aria-label="Tarif: activate to sort column ascending">Tarif</th>
                                        <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1"
                                            colspan="1" aria-label="Mode de paiement: activate to sort column ascending">
                                            Mode de paiement</th>
                                    @endif
                                    @if ($event->fields->count())
                                        <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1"
                                            colspan="1"
                                            aria-label="Valeur du champ libre: activate to sort column ascending">Valeur du
                                            champ libre</th>
                                    @endif
                                    @foreach ($additional_fields as $field)
                                        <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1"
                                            colspan="1"
                                            aria-label="{{ $field }}: activate to sort column ascending">
                                            {{ $field }}</th>
                                    @endforeach
                                    <td>Options</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->participants as $participant)
                                    <tr class="odd">
                                        <td>{{ $participant->lastname }}</td>
                                        <td>{{ $participant->firstname }}</td>
                                        <td>{{ $participant->civility }}</td>
                                        <td>{{ $participant->email }}</td>
                                        <td>{{ $participant->phone }}</td>
                                        @if ($event->eventPrices->count())
                                            <td>{{ $participant->price . ' FCFA' }}</td>
                                            <td>{{ $participant->payment_method }}</td>
                                        @endif
                                        @if ($event->fields->count())
                                            <td>{{ $participant->field->name . ':' . $participant->field->value }}</td>
                                        @endif
                                        @if (count($additional_fields) != 0)
                                            @if (count(json_decode($participant->additional_data, true)) !== 0)
                                                @foreach (array_values(json_decode($participant->additional_data, true)) as $value)
                                                    @if (stristr($value, 'data:'))
                                                        <td>
                                                            <a href="{{ $value }}"
                                                                download="{{ 'file.' . explode('/', explode(';base64,', $value)[0])[1] }}">Télécharger</a>
                                                        </td>
                                                    @else
                                                        <td>{{ $value }}</td>
                                                    @endif
                                                @endforeach
                                            @else
                                                @for ($fieldIndex = 0; $fieldIndex < count($additional_fields); $fieldIndex++)
                                                    <td>Aucun</td>
                                                @endfor
                                            @endif
                                        @endif
                                        <td>
                                            <button class="btn btn-info" class="editParticipantBtn">
                                                <i class="fas fa-pen"></i>
                                                <span>Editer</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="editParticipant" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editer un participant</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="lastname">
                                <span>Nom</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Entrez le nom" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">
                                <span>Prénom</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Entrez le nom" required>
                        </div>
                        <div class="form-group">
                            <label for="civility">
                                <span>Civilité</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select name="civility" id="civility" class="form-control" required>
                                @foreach (['Monsieur', 'Madame', 'Mademoiselle'] as $civility)
                                    <option value="{{ $civility }}">{{ $civility }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                <span>Téléphone</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="phone" id="phone" class="form-control" required>
                        </div>
                        @if ($event->form)
                            <div id="additional_fields_container" data-fields="{{ $event->form->data }}"></div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger modal_form_submit_btn">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('additional_script')
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script src="{{ asset('js/participants-list.js') }}"></script>
<script src="{{ asset('app_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    
@endsection
