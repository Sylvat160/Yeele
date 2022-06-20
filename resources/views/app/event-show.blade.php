@extends('layouts.app-main')
@section('title')
    {{$event->name}}
@endsection
@section('bigTitle') {{$event->name}} @endsection

@section('main')

    @include('extras.success_message')
    @include('extras.warning_message')

    <div class="row">
        <div class="col-md-6 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $event->participants->count()  }}</h3>
      
                <p>Inscriptions</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-md-6 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $event->clicks }}</h3>
      
                <p>Clicks des liens</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
    </div>
@endsection