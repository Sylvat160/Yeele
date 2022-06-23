<div class="pt-2 mb-2 d-flex justify-content-center align-items-center formule bg-info rounded">
    <h6>Menu de l'évènement</h6>
</div>
<li class="nav-item">
    <a href="{{ route('event_participants.list', $event_uid) }}" class="nav-link" data-event_menu_path="participants">
        <i class="fa-solid fa-users"></i>
        <span>Liste des inscrits</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('event_price.index', $event_uid) }}" class="nav-link" data-event_menu_path="event_price">
        <i class="fa-solid fa-money-bill"></i>
        <span>Tarifs</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('event_payment_method.index', $event_uid) }}" class="nav-link"
        data-event_menu_path="event_payment_method">
        <i class="fa-solid fa-credit-card"></i>
        <span>Modes de paiement</span>
    </a>
</li>
@if ($hasDynamicForm && Auth::user()->custom['currentCommand']->plan_id === 2)
    <li class="nav-item">
        <a href="{{ route('event.new_form', $event_uid) }}" class="nav-link d-flex align-items-center" data-event_menu_path="creation_formulaire">
            <img src="{{ asset('images/icons/form.svg') }}" width="23" alt="Formulaire">
            <span>Créer un formulaire</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center" data-event_menu_path="fields">
            <img src="{{ asset('images/icons/form.svg') }}" width="23" alt="Formulaire">
            <span>Modifier le formulaire</span>
        </a>
    </li>
@endif
<li class="nav-item">
    <a href="{{ route('show_event_form', $event_uid) }}" target="_blank" class="nav-link">
        <i class="fa-solid fa-eye"></i>
        <span>Aperçu du formulaire</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('field.index', $event_uid) }}" class="nav-link" data-event_menu_path="field">
        <i class="fa-solid fa-pen"></i>
        <span>Champ libre</span>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-envelope"></i>
        <span>Envoi de mail</span>
    </a>
</li>
