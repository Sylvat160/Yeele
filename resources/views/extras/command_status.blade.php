@if(Auth::user()->custom['currentCommand'])

  @if(!Auth::user()->custom['currentCommand']->payment_method_id && Auth::user()->custom['currentCommand']->plan_id !== 1)
  <div class="mb-4 p-3 d-flex justify-content-between align-items-center rounded" style="background-color: #ebbd35;">
    <div>
      <i class="fa-solid fa-circle-exclamation"></i>
      <span class="font-weight-bold">Votre commande n'est pas encore à bout. Veuillez poursuivre!</span>
    </div>
    <div>
      <a href="{{ route('command.edit', Auth::user()->custom['currentCommand']->uid) }}" style="color: #000 !important;">
        <span>Poursuivre</span>
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
  @endif

@else
  <div class="mb-4 p-3 d-flex flex-column flex-md-row justify-content-between align-items-center rounded" style="background-color: #ebbd35;">
    <div>
      <i class="fa-solid fa-circle-exclamation"></i>
      <span class="font-weight-bold">Vous n'avez aucune commande à jour!</span>
    </div>
    <div>
      <a href="{{ route('command.create') }}" style="color: #000 !important;">
        <span>Ajouter une commande</span>
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
@endif