@extends('layouts.app-main')
@section('title')
    {{ $event->name }} / Envoi de mails
@endsection
@section('bigTitle')
    {{ $event->name }} / Envoi de mails
@endsection

@section('main')
    @include('extras.success_message')
    @include('extras.danger_message')
<style>
    #uploadedFileContainer .konvajs-content {margin: auto !important}
</style>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mt-1">Liste des inscrits</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="overflow-x: scroll;">
            <div class="mailbox-controls">
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square" id="checkAll"></i>
                </button>
                <span>Cocher tout</span>
              </div>
            <div id="data_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <table id="usersData" class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th>Case à cocher</th>
                                    <th class="sorting" tabindex="0" aria-controls="Status" rowspan="1" colspan="1"
                                        aria-label="Civilité: activate to sort column ascending">Civilité</th>
                                    <th class="sorting" tabindex="0" aria-controls="Plan" rowspan="1" colspan="1"
                                        aria-sort="Plan" aria-label="Nom: activate to sort column descending">Nom
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="Duration" rowspan="1"
                                        colspan="1" aria-label="Prenom: activate to sort column ascending">Prenom</th>
                                    <th class="sorting" tabindex="0" aria-controls="Price" rowspan="1" colspan="1"
                                        aria-label="Email: activate to sort column ascending">Adresse e-mail</th>
                                    <th class="sorting" tabindex="0" aria-controls="Payment_method" rowspan="1"
                                        colspan="1" aria-label="Téléphone: activate to sort column ascending">Téléphone
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event->participants as $participant)
                                    <tr class="odd">
                                        <td>
                                            <div class="icheck-primary">
                                                <input type="checkbox" value="{{ $participant->email }}"
                                                    id="{{ $participant->email }}" class="checkbox">
                                                <label for="{{ $participant->email }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $participant->civility }}</td>
                                        <td>{{ $participant->lastname }}</td>
                                        <td>{{ $participant->firstname }}</td>
                                        <td>{{ $participant->email }}</td>
                                        <td>{{ $participant->phone }}</td>
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
    <form action="{{ route('bulkmail.send') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="participants" id="checkedemails" value="[]" required>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Ecrivez votre mail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="subject">
                        <span>Sujet: </span>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Entrez le sujet" required>
                    @error('subject')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="compose-textarea">Champ de saisie: </label>
                    <textarea name="body" id="compose-textarea" class="form-control" style="height: 250px"></textarea>
                </div>
                <div class="alert alert-dismissible mb-4 p-3 d-flex justify-content-between align-items-center rounded" style="background-color: rgb(136, 183, 255);">
                    <div>
                      <i class="fa-solid fa-circle-exclamation"></i>
                      <span class="font-weight-bold">Le nom complet du participant sera horizontalement et verticalement aligné sur le certificat et/ou le badge.</span>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fas fa-paperclip"></i>
                                <span>Certificat de participation</span>
                                <input type="file" id="certificate" name="certificate">
                            </div>
                            <p id="certificateName"></p>
                            @error('certificate')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fas fa-paperclip"></i>
                                <span>Badge de participation</span>
                                <input type="file" id="badge" name="badge">
                            </div>
                            <p id="badgeName"></p>
                            @error('badge')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
    </form>
        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Envoyer</button>
            </div>
        </div>
        <!-- /.card-footer -->
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
    <script src="{{ asset('app_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="https://unpkg.com/konva@8/konva.min.js"></script>
    <script src="{{ asset('js/bulkmail.js') }}" type="module"></script>
@endsection
