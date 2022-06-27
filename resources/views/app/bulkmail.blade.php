@extends('layouts.app-main')
@section('title')
    {{ $event->name }} / Envoi de mails
@endsection
@section('bigTitle')
    {{ $event->name }} / Envoi de mails
@endsection

@section('main')
    <div class="row justify-content-center my-4">
        <div class="col-12 col-md-10">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Envoi de mails</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="container">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                            <div class="float-right">
                                1-50
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                        </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Case</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                            </thead>
                            <tbody>
                                @forelse ($event->participants as $participant)
                                    <tr>
                                        <td>
                                            <div class="icheck-primary">
                                                <input type="checkbox" value="{{ $participant->email }}"
                                                    id="{{ $participant->email }}" class="checkbox">
                                                <label for="{{ $participant->email }}"></label>
                                            </div>
                                        </td>
                                        <td class="bulkmail-lastname">{{ $participant->lastname }}</td>
                                        <td class="bulkmail-firstname">{{ $participant->firstname }}</td>
                                        <td class="bulkmail-email"><strong>{{ $participant->email }}</strong></td>
                                        <td class="bulkmail-phone">{{ $participant->phone }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-10">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Ecriver votre mail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <input class="form-control" placeholder="Sujet" required>
                  </div>
                  <div class="form-group">
                      <textarea id="compose-textarea" class="form-control" style="height: 250px"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                              <i class="fas fa-paperclip"></i>
                              <span>Certificat de participation</span>
                              <input type="file" name="certificate">
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <div class="btn btn-default btn-file">
                              <i class="fas fa-paperclip"></i>
                              <span>Badge de participation</span>
                              <input type="file" name="badge">
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="float-right">
                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Envoyer</button>
                  </div>
                </div>
                <!-- /.card-footer -->
              </div>
        </div>
    </div>
@endsection
@section('additional_script')
<script src="{{ asset('app_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function () {
    $('#compose-textarea').summernote()
  })
  //Enable check and uncheck all functionality
  $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
          //Uncheck all checkboxes
          $('.checkbox').prop('checked', false)
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
          //Check all checkboxes
          $('.checkbox').prop('checked', true)
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
      })
</script>
@endsection