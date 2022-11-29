@extends('layouts.app-main')
@section('title')
 Liste des inscrits
@endsection
@section('bigTitle')
 Liste des inscrits
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
                                <th class="sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="Téléphone: activate to sort column ascending">Entreprise</th>
                                <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1" colspan="1" aria-label="Téléphone: activate to sort column ascending">Téléphone
                                </th>
                                
                                <th>Edition</th>
                                <th>Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="odd">
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->organization }}</td>
                                <td>{{ $user->phone }}</td>
                                    <td>
                                        <a href="{{route('user.details',$user->uid)}}" class="btn btn-info" class="editParticipantBtn">
                                            <span>Details</span>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary participant-delete" >
                                            <span>Supprimer</span>
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

<div class="modal fade" id="modal_destroy" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression d'un utilisateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="" method="post" id="destroy_modal_form">
                <input type="hidden" name="participant_id" id="to_remove_participant_id" required>
                <div class="modal-body">
                    @csrf
                    <div class="text-danger">
                        <h1>Attention!</h1>
                        <p>Vous êtes sur le point de supprimer <strong id="to_remove_participant_fullname"></strong>. Cette action
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

