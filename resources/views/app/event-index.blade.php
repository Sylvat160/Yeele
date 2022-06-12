@extends('layouts.app-main')
@section('title')
    Mes évènements
@endsection
@section('bigTitle')
    Mes évènements
@endsection

@section('main')
    <div class="row @if(Auth::user()->events->count() < 2) justify-content-center @endif">
        @foreach (Auth::user()->events->sortDesc() as $event)
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
                            <ul class="dropdown-menu p-2" aria-labelledby="event_menu" style="width: 210px !important;">
                                <li>
                                    <a href="#" class="text-dark">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span>Modifier l'évènement</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-dark">
                                        <i class="fa-solid fa-trash-can"></i>
                                        <span>Supprimer l'évènement</span>
                                    </a>
                            </li>
                              </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="font-weight-bold text-center">{{ $event->name }}</h4>
                        <div class="d-md-flex justify-content-between">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset("storage/$event->image") }}" width="200" height="350" alt="{{ $event->name }}">
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
                                        <span class="ml-2"><strong>Début</strong>: {{ date_format(new DateTime($event->start_date_time), 'd/m/Y à H:i') }}</span>
                                </div>
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="fa-solid fa-clock text-primary" style="font-size: 21px"></i>
                                    <span class="ml-2"><strong>Fin</strong>: {{ date_format(new DateTime($event->end_date_time), 'd/m/Y à H:i') }}</span>
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
                                    <a href="{{ route('event.show', $event->uid) }}" class="btn btn-primary">Voir l'évènement</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection