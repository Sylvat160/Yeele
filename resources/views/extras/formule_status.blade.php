@if (Auth::user()->custom['currentCommand'])
    @switch(Auth::user()->custom['currentCommand']->plan->id)
        @case(3)
            <div class="pt-2 d-flex justify-content-center align-items-center formule bg-warning">
                <h6>Formule actuelle: <span class="font-weight-bold">Gold</span></h6>
            </div>
            @break
    
        @default
            <div class="pt-2 d-flex justify-content-center align-items-center formule bg-light">
                <h6>Formule actuelle: <span class="font-weight-bold">Silver</span></h6>
            </div>
    @endswitch
@else
    <div class="pt-2 d-flex justify-content-center align-items-center formule bg-green">
        <h6>Formule actuelle: <span class="font-weight-bold">Free</span></h6>
    </div>
@endif