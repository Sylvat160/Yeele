@extends('layouts.app-main')
@section('title') Tableau de bord @endsection
@section('bigTitle') Tableau de bord @endsection

@section('main')



{{-- SUCCESS MESSAGE --}}
@include('extras.success_message')

<div class="row">
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $user->events->count() }}</h3>

                <p>Evènements</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar"></i>
            </div>
            <a href="{{ route('user.events',$user->uid) }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3> {{$user->custom['allParticipants']}} </h3>


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
                <h3>{{ $user->commands->count() }}</h3>
                <p>Total des commandes</p>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <a href="{{ route('user.orders',$user->uid ) }}" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>

        </div>
    </div>
    <!-- ./col -->
</div>


@endsection

