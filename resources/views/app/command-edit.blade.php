@extends('layouts.app-main')
@section('title') Commande en cours @endsection
@section('bigTitle') Commande en cours @endsection

@section('main')

  <div class="row justify-content-center">
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card">
        <form action="{{ route('command.update', $command->uid) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">

            <div class="form-group">
              <label for="plan">
                <span>Votre formule</span>
                <span class="text-danger">*</span>
              </label>
              <select name="plan" id="plan" class="form-control" required>
                <option class="d-none" selected>Choisissez votre formule</option>
                @foreach ($plans as $plan)
                  <option
                   value="{{ $plan->id }}" 
                   data-price="{{ $plan->price }}"
                   @if(Auth::user()->custom['currentCommand']->plan->id === $plan->id)
                    selected
                   @endif
                   >{{ $plan->name }} ({{ $plan->price . ' FCFA' }})</option>
                @endforeach
              </select>
              @error('plan')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="duration">
                <span>Durée de la commande</span>
                <span class="text-danger">*</span>
              </label>
              <select class="custom-select" name="duration" id="duration" required>
                <option class="d-none" selected>Choisissez la durée de votre commande</option>
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
              <select name="payment_method" id="payment_method" class="form-control" required>
                <option class="d-none" selected>Choisissez votre mode de paiement</option>
                @foreach ($payment_methods as $method)
                  <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
              </select>
              @error('payment_method')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

          </div>

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
      value: Number({{$plan->price}}),
      setValue(newValue) {
        this.value = newValue
        window.dispatchEvent(new Event('command'))
      }
    }
    const total_amount = $('#total_amount')

    const plan_state = Object.create(state)
    const duration_state = Object.create(state)

    $('#plan').on('change', function() {
      const price = Number(this.options[this.selectedIndex].dataset.price)
      plan_state.setValue(price)
    })
    $('#duration').on('change', function() {
      const duration = Number(this.options[this.selectedIndex].value)
      duration_state.setValue(duration)
    })

    window.addEventListener('command', function() {
      const new_amount = plan_state.value * duration_state.value
      total_amount.val(`${new_amount} FCFA`)
    })

  </script>
@endsection