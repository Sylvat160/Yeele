<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Données du questionnaire sur la signature électronique</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('app_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('app_assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('app_assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
{{-- CHANGE TABLE --}}

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-1">Liste des réponses</h3>
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
                                        @for ($i = 1; $i <= 5; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ $i }}
                                            </th>
                                        @endfor
                                        @for ($i = 1; $i <= 5; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ "6.$i" }}
                                            </th>
                                        @endfor
                                        @for ($i = 7; $i <= 10; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ $i }}
                                            </th>
                                        @endfor
                                        @for ($i = 1; $i <= 13; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ "11.$i" }}
                                            </th>
                                        @endfor
                                        @for ($i = 12; $i <= 13; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ $i }}
                                            </th>
                                        @endfor
                                        @for ($i = 1; $i <= 4; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ "14.$i" }}
                                            </th>
                                        @endfor
                                        @for ($i = 1; $i <= 11; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ "15.$i" }}
                                            </th>
                                        @endfor
                                        @for ($i = 16; $i <= 17; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question" rowspan="1"
                                                colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ $i }}
                                            </th>
                                        @endfor
                                        @for ($i = 1; $i <= 5; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question"
                                                rowspan="1" colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ "18.$i" }}
                                            </th>
                                        @endfor
                                        @for ($i = 19; $i <= 22; $i++)
                                            <th class="sorting" tabindex="0" aria-controls="question"
                                                rowspan="1" colspan="1" aria-sort="Plan"
                                                aria-label="Question: activate to sort column descending">Question
                                                {{ $i }}
                                            </th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($electronicSignatures as $data)
                                        <tr>
                                            @foreach ($keys as $key)
                                                @if (is_array($data[$key]))
                                                    @switch($key)
                                                        @case('interest')
                                                            @if (count($data[$key]) === 6)
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @else
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                                @foreach (array_fill(0, (6 - count($data[$key]) - 1), 'Aucun') as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @endif
                                                        @break

                                                        @case('usage_reason')
                                                            @if (count($data[$key]) === 13)
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @else
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                                @foreach (array_fill(0, (13 - count($data[$key])), 'Aucun') as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @endif
                                                        @break

                                                        @case('obstacles')
                                                            @if (count($data[$key]) === 11)
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @else
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                                @foreach (array_fill(0, (11 - count($data[$key])), 'Aucun') as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @endif
                                                        @break

                                                        @case('alternatives')
                                                            @if (count($data[$key]) === 5)
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @else
                                                                @foreach ($data[$key] as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                                @foreach (array_fill(0, (5 - count($data[$key])), 'Aucun') as $v)
                                                                    <td>{{ $v }}</td>
                                                                @endforeach
                                                            @endif
                                                        @break

                                                        @default
                                                    @endswitch
                                                @else
                                                    <td>{{ $data[$key] ? $data[$key] : 'Aucun' }}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('app_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('app_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('app_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('app_assets/dist/js/adminlte.js') }}"></script>
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
    <script src="{{ asset('js/participants-list.js') }}"></script>
    </script>
</body>

</html>
