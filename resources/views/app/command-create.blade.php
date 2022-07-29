@extends('layouts.app-main')
@section('title') Nouvelle commande @endsection
@section('bigTitle') Nouvelle commande @endsection

@section('additional_head')
  <script src="{{ asset('js/cinetpay.js') }}"></script>
@endsection

@section('main')

@include('extras.command_status')

@if (isset(Auth::user()->custom['currentCommand']) && Auth::user()->custom['currentCommand']->payment_method_id) 
  <div class="mb-4 p-3 rounded" style="background-color: #ebbd35;">
      <div>
        <i class="fa-solid fa-circle-exclamation"></i>
        <span class="font-weight-bold">Si vous commander une formule Gold, elle remplacera automatiquement votre commande actuelle.</span>
      </div>
      <div>
        <i class="fa-solid fa-circle-exclamation"></i>
        <span class="font-weight-bold">Si vous commander une formule Gold, elle remplacera automatiquement votre commande actuelle.</span>
      </div>
      </div>
  </div>
@endif

  <div class="row justify-content-center">
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card">
        <form action="{{ route('command.store') }}" method="POST">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <label for="plan">
                <span>Votre formule</span>
                <span class="text-danger">*</span>
              </label>
              <select name="plan_id" id="plan" class="form-control" required>
                <option class="d-none" selected>Choisissez votre formule</option>
                @foreach ($plans as $plan)
                  <option value="{{ $plan->id }}" data-price="{{ $plan->price }}">{{ $plan->name }} ({{ $plan->price . ' FCFA' }})</option>
                @endforeach
              </select>
              @error('plan_id')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="duration">
                <span>Durée de la commande</span>
                <span class="text-danger">*</span>
              </label>
              <select class="custom-select" name="duration" id="duration" required>
                <option class="d-none" value="" selected>Choisissez la durée de votre commande</option>
                @for ($i = 1; $i <= 12; $i++)
                  <option value="{{ $i }}">{{ $i . ' mois' }}</option>
                @endfor
              </select>
              @error('duration')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="total_amount">Montant total</label>
              <input type="text" id="total_amount" class="form-control" value="0 FCFA" disabled>
            </div>

            <div class="form-group" id="payment_method_container">
              <label for="payment_method">
                <span>Mode de paiement</span>
                <span class="text-danger">*</span>
              </label>
              <select name="payment_method_id" id="payment_method" class="form-control" required disabled>
                <option class="d-none" value="" selected>Choisissez votre mode de paiement</option>
                @foreach ($payment_methods as $method)
                  <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
              </select>
              @error('payment_method_id')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group" id="payment_container">

            </div>
          </div>
          <input type="hidden" name="payment_status" value="0" required>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Valider la commande</button>
          </div>
          
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('additional_script')
  <script>
    const state = {
      value: 0,
      setValue(newValue) {
        this.value = newValue
        window.dispatchEvent(new Event('command'))
      }
    }
  </script>
  <script src="{{ asset('js/command.js') }}"></script>
@endsection