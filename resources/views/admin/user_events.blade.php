@extends('layouts.app-main')
@section('title')
Mes évènements
@endsection
@section('bigTitle')
Mes évènements
@endsection

@section('main')

@include('extras.success_message')
<div class="row @if ( (bool) $user && $user->events->count() < 2) justify-content-center @endif">
    @forelse($user->events->sortDesc() as $event)
    <div class="col-12 col-md-6 gap-2">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex">
                    <img src="{{ asset('images/icons/event.svg') }}" width="40" height="40" alt="évènement">

                </div>
                <div class="card-tools dropdown">
                    <button class="bg-transparent border-0" type="button" id="event_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="height: 40px;">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="event_menu" style="width: 210px !important;">
                        <li>
                            <a href="{{ route('event.edit', $event->uid) }}" class="text-dark">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span>Modifier l'évènement</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-dark destroy_btn" data-event_name="{{ $event->name }}" data-route="{{ route('event.destroy', $event->uid) }}">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Supprimer l'évènement</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('show_event_form', $event->uid) }}" target="_blank" class="text-dark">
                                <i class="fa-solid fa-eye"></i>
                                <span>Aperçu du formulaire</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <h4 class="font-weight-bold text-center">{{ $event->name }}</h4>
                <div class="d-md-flex justify-content-between">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset("storage/$event->image") }}" width="200" height="330" alt="{{ $event->name }}">
                    </div>
                    <div class="d-md-flex flex-md-column justify-content-between p-md-3">
                        <div class="mb-3 d-flex align-items-center">
                            <i class="fa-solid fa-flag text-primary" style="font-size: 21px"></i>
                            <span class="ml-2">{{ $event->country }}</span>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="fa-solid fa-city text-primary" style="font-size: 21px"></i>
                            <span class="ml-2">{{ $event->city }}</span>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="fa-solid fa-location-dot text-primary" style="font-size: 21px"></i>
                            <span class="ml-2">{{ $event->location }}</span>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="fa-solid fa-clock text-primary" style="font-size: 21px"></i>
                            <span class="ml-2"><strong>Début</strong>:
                                {{ date_format(new DateTime($event->start_date_time), 'd/m/Y à H:i') }}</span>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <i class="fa-solid fa-clock text-primary" style="font-size: 21px"></i>
                            <span class="ml-2"><strong>Fin</strong>:
                                {{ date_format(new DateTime($event->end_date_time), 'd/m/Y à H:i') }}</span>
                        </div>
                        @if ($event->start_date_time <= now() && $event->end_date_time >= now())
                            <div class="mb-3">
                                <strong class="text-green">Evènement en cours</strong>
                            </div>
                            @elseif (now() > $event->end_date_time)
                            <div class="mb-3">
                                <strong class="text-danger">Evènement terminé</strong>
                            </div>
                            @else
                            <div class="mb-3">
                                <strong class="text-warning">Evènement à venir</strong>
                            </div>
                            @endif

                            <div>
                                <a href="{{ route('event.show', $event->uid) }}" class="btn btn-primary">Voir
                                    l'évènement</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset('images/illustrations/empty.svg') }}" width="200" alt="Aucun évènement enregistré">
            </div>
            <div class="card-footer bg-white">
                <h5 class="text-center">Vous n'avez aucun évènement enrégistré.</h5>
                <div class="mt-4 text-center">
                    <a href="{{ route('event.create') }}" class="btn btn-primary">Créer un évènement</a>
                </div>
            </div>
        </div>
    </div>
    @endforelse
</div>

<div class="modal fade" id="modal_destroy" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression de l'évènement</h4>
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
                        <p>Vous êtes sur le point de supprimer <strong id="destroy_event_name"></strong>. Cette action
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
    const destroy_btns = $('.destroy_btn')
    destroy_btns.each(function() {
        $(this).on('click', function() {
            const event_name = this.dataset.event_name
            const route = this.dataset.route
            $('#destroy_modal_form').attr('action', route)
            $('#destroy_event_name').html(`"${event_name}"`)
            $('#modal_destroy').modal()
        })
    })

</script>
@endsection

