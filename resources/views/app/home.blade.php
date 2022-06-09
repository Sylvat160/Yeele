@extends('layouts.app-main')
@section('title') Tableau de bord @endsection
@section('bigTitle') Tableau de bord @endsection

@section('main')

@if(!Auth::user()->custom['currentCommand']->payment_method && Auth::user()->custom['currentCommand']->plan_id !== 1)
  <div class="mb-4 p-3 d-flex justify-content-between align-items-center rounded" style="background-color: #ebbd35;">
    <div>
      <i class="fa-solid fa-circle-exclamation"></i>
      <span class="font-weight-bold">Votre commande n'est pas encore à bout. Veuillez poursuivre!</span>
    </div>
    <div>
      <a href="#" style="color: #000 !important;">
        <span>Poursuivre</span>
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
@endif

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
        <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-12">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>1457</h3>

          <p>Inscriptions</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-12">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Clicks des liens</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  {{-- Stats-End --}}


@endsection