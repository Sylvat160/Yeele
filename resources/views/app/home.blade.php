@extends('layouts.app-main')
@section('title') Tableau de bord @endsection
@section('bigTitle') Tableau de bord @endsection

@section('main')

@include('extras.command_status')

{{-- SUCCESS MESSAGE --}}
@include('extras.success_message')
{{-- END SUCCESS MESSAGE --}}
@can('admin')
<div class="row">
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3> {{$events}} </h3>

                <p>Evènements</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar"></i>
            </div>
            <a href="{{ route('all.events') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3> {{ $participants }} </h3>

                <p>Participants</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <div class="small-box-footer" style="height: 30px;"></div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $users }}</h3>

                <p>Utilisateurs</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('users_list') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

@else
<div class="row">
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ Auth::user()->events->count() }}</h3>

                <p>Evènements</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar"></i>
            </div>
            <a href="{{ route('event.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ Auth::user()->custom['allParticipants'] }}</h3>

                <p>Inscriptions</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <div class="small-box-footer" style="height: 30px;"></div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ Auth::user()->commands->count() }}</h3>

                <p>Total de vos commandes</p>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <a href="{{ route('command.index') }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
@endcan


{{-- Stats-End --}}


@endsection
