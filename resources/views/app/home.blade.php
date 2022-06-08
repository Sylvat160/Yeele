@extends('layouts.app-main')

@section('title') Tableau de bord @endsection
@section('bigTitle') Tableau de bord @endsection

@section('main')
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