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
                    <table id="usersData" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="Plan" rowspan="1" colspan="1" aria-sort="Plan" aria-label="Nom: activate to sort column descending">Nom
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="Duration" rowspan="1" colspan="1" aria-label="Prenom: activate to sort column ascending">Prenom</th>
                                <th class="sorting" tabindex="0" aria-controls="Status" rowspan="1" colspan="1" aria-label="Civilité: activate to sort column ascending">Civilité</th>
                                <th class="sorting" tabindex="0" aria-controls="Price" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Adresse e-mail</th>
                                <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1" colspan="1" aria-label="Téléphone: activate to sort column ascending">Téléphone
                                </th>
                                @if ($event->eventPrices->count())
                                <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1" colspan="1" aria-label="Tarif: activate to sort column ascending">Tarif(s)</th>
                                <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1" colspan="1" aria-label="Mode de paiement: activate to sort column ascending">
                                    Mode de paiement</th>
                                @endif
                                @if ($event->fields->count())
                                <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1" colspan="1" aria-label="Valeur du champ libre: activate to sort column ascending">Valeur du
                                    champ libre</th>
                                @endif
                                @foreach ($additional_fields as $field)
                                <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1" colspan="1" aria-label="{{ $field }}: activate to sort column ascending">
                                    {{ $field }}</th>
                                @endforeach
                                <th>Edition</th>
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
                                @if ($event->multiple_prices_active)
                                <td>
                                    @foreach ($participant->participantPrices as $price)
                                    @if ($event->prices_quantity_active)
                                    <span>{{ $price->eventPrice->value . ' FCFA' }} ({{$price->quantity}}) </span><br>
                                    @else
                                    {{ $price->eventPrice->value . ' FCFA' }}
                                    @endif
                                    @endforeach
                                </td>
                                @else
                                <td>{{ $participant->price . ' FCFA' }}</td>
                                @endif
                                <td>{{ $participant->payment_method }}</td>
                                @endif
                                @if ($event->fields->count())
                                <td>{{ $participant->field->name . ':' . $participant->field->value }}</td>
                                @endif
                                @if (count($additional_fields) != 0)
                                @if (count(json_decode($participant->additional_data, true)) !== 0)
                                @foreach (array_values(json_decode($participant->additional_data, true)) as $value)
                                @if (is_string($value) AND stristr($value, 'data:'))
                                <td>
                                    <a href="{{ $value }}" download="{{ $participant->firstname . "_$participant->lastname" . "." . explode('/', explode(';base64,', $value)[0])[1] }}">Télécharger</a>
                                </td>
                                @elseif (is_array($value))
                                <td>
                                    @foreach ($value as $v)
                                    {{$v}},
                                    @endforeach
                                </td>
                                @else
                                <td>{{ $value ? $value : "Aucun" }}</td>
                                @endif
                                @endforeach
                                @else
                                @for ($fieldIndex = 0; $fieldIndex < count($additional_fields); $fieldIndex++) <td>Aucun</td>
                                    @endfor
                                    @endif
                                    @endif
                                    <td>
                                        <a href="{{ route('participant.payment.edit', [$participant->id, $participant->event->uid]) }}" class="btn btn-info" class="editParticipantBtn">
                                            <span>Editer</span>
                                        </a>
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



@endsection
@section('additional_script')
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
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script>
    $(function() {
        $("#usersData").DataTable({
            "responsive": false
            , "lengthChange": false
            , "autoWidth": false
            , "paging": true
            , "buttons": []
            , "language": {
                "searchPlaceholder": "Rechercher ..."
                , "lengthMenu": "Afficher _MENU_ enrégistrements par page"
                , "zeroRecords": "Aucune participant trouvé"
                , "info": "Showing page _PAGE_ of _PAGES_"
                , "infoEmpty": ""
                , "infoFiltered": "(Filtré à partir de la liste _MAX_.)"
                , "lengthMenu": "Montrer _MENU_ enrégistrement(s)."
                , "loadingRecords": "Chargement..."
                , "processing": "En cours..."
                , "search": "_INPUT_"
                , "placeholder": "Rechercher"
                , "info": "_TOTAL_ enrégistrement(s)"
                , "infoEmpty": "0 enrégistrement"
                , "zeroRecords": "Aucune participant trouvé"
                , "paginate": {
                    "first": "Premier"
                    , "last": "Dernier"
                    , "next": "Suivant"
                    , "previous": "Précédent"
                }
            , }
        }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
    });

    $('.participant-delete').each(function() {
        $(this).click(function() {
            const data = JSON.parse($(this).attr('data-participant'))
            $('#to_remove_participant_id').attr('value', data.id)
            $('#to_remove_participant_fullname').html(data.fullname)
            $('#modal_destroy').modal()
        })
    })

</script>
@endsection

