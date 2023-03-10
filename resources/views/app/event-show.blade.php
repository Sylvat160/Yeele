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

<div class="row">
    @if($event->eventPrices->count() > 0)
    <div class="col-md-6 col-12">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3> {{ number_format($madePayments,0,'.',' ') }} </h3>



                <p>Paiements total pour cet evenement </p>
                <p> {{ number_format($payment_total , 0 , '.' ,' ') }} </p>


            </div>
            <div class="icon">
                <i class="fas fa-sack-dollar"></i>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6 col-12">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3></h3>

                <p>Evenement gratuit</p>
            </div>
            <div class="icon">
            </div>
        </div>
    </div>


    @endif
</div>

<div class="row">
    @foreach($paymentMethods as $paymentMethod)
    <div class="col-md-6 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            
                <h3>{{ number_format($event->participants->where('payment_method', $paymentMethod->name)->where('payment_status', 1 )->sum('price'),0,'.',' ') }} </h3>
                
                <p>{{ $paymentMethod->name }}</p>
                <p>{{ number_format($event->participants->where('payment_method', $paymentMethod->name)->sum('price'), 0, ',', ' ') }}</p>
            </div>
            <div class="icon">
                
            </div>
        </div>
    </div>
    <!-- ./col -->
    @endforeach
</div>




@endsection
