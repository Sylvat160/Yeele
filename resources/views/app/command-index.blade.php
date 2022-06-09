@extends('layouts.app-main')
@section('title') Mes commandes @endsection
@section('bigTitle') Mes commandes @endsection

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title mt-1">Liste de mes commandes</h3>
        <div class="card-tools">
            <a href="{{ route('command.create') }}" class="btn btn-primary">Ajouter une commande</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="data_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row mt-1">
                <div class="col-sm-12">
                    <table id="usersData" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="Plan" rowspan="1"
                                    colspan="1" aria-sort="Plan"
                                    aria-label="Plan: activate to sort column descending">Formule
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="Duration" rowspan="1" colspan="1"
                                    aria-label="Duration: activate to sort column ascending">Durée</th>
                                <th class="sorting" tabindex="0" aria-controls="Price" rowspan="1" colspan="1"
                                    aria-label="Price: activate to sort column ascending">Montant</th>
                                <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1" colspan="1"
                                    aria-label="Payment_method: activate to sort column ascending">Mode de paiement</th>
                                <th class="sorting" tabindex="0" aria-controls="Status" rowspan="1" colspan="1"
                                    aria-label="Status: activate to sort column ascending">Statut</th>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="Start_date" rowspan="1" colspan="1"
                                aria-label="Start_date: activate to sort column ascending">Date de début</th>
                                <th>Date de fin</th>
                                <th>Date de souscription</th>
                                <th>Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->commands as $command)
                                <tr class="odd">
                                    <td>{{ $command->plan->name }}</td>
                                    <td>{{ $command->duration . ' mois' }}</td>
                                    <td>{{ $command->plan->price . ' FCFA' }}</td>
                                    <td>{{ !is_null($command->payment_method) ?$command->payment_method->name : 'Aucun' }}</td>
                                    <td>
                                        @if (is_null($command->payment))
                                            @switch($command->payment)
                                                @case(true)
                                                <span class="text-green">Payé</span>
                                                @break
                                                @case(false)
                                                <span class="text-danger">Non Payé</span>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        @endif
                                    </td>
                                    <td>
                                        {{date_format(new DateTime($command->start_date_time), 'd/m/Y à H:i')}}
                                    </td>
                                    <td>
                                        {{date_format(new DateTime($command->end_date_time), 'd/m/Y à H:i')}}
                                    </td>
                                    <td>
                                        {{$command->created_at->format('d/m/Y à H:i')}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                                data-target="#modal_destroy_{{ $command->uuid }}"
                                                style="width: fit-content;">
                                                Supprimer
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
<script src="{{ asset('app_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function() {
        $("#usersData").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "paging": true,
            "lengthMenu": [10, 25, 50, 75, 100, 150, 200, 250, 300, 350, 400, 450, 500],
            "buttons": ["excel", "pdf"],
            "language": {
                "searchPlaceholder": "Rechercher ...",
                "lengthMenu": "Afficher _MENU_ enregistrements par page",
                "zeroRecords": "Aucune commande trouvée",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "",
                "infoFiltered": "(Filtré à partir de la liste _MAX_.)",
                "lengthMenu": "Show _MENU_ entries",
                "loadingRecords": "Chargement...",
                "processing": "En cours...",
                "search": "_INPUT_",
                "placeholder": "Rechercher",
                "info": "_TOTAL_ enregistrement(s)",
                "infoEmpty": "0 enregistrement",
                "zeroRecords": "Aucune commande trouvée",
                "paginate": {
                    "first": "Premier",
                    "last": "Dernier",
                    "next": "Suivant",
                    "previous": "Précédent"
                },
            }
        }).buttons().container().appendTo('#data_wrapper .col-md-6:eq(0)');
    });
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection