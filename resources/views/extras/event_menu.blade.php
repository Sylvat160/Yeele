<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-square-poll-vertical"></i>
        <span>Rapports</span>
        <i class="fas fa-angle-left right"></i>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('event_participants.list', $event_uid) }}" class="nav-link" data-event_menu_path="participants">
                <i class="fa-solid fa-users"></i>
                <span>Liste des inscrits</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-gear"></i>
        <span>Paramétrages</span>
        <i class="fas fa-angle-left right"></i>
    </a>
    <ul class="nav nav-treeview">
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
                <a href="{{ route('event.edit_form', $event_uid) }}" class="nav-link d-flex align-items-center" data-event_menu_path="modification_formulaire">
                    <img src="{{ asset('images/icons/form.svg') }}" width="23" alt="Formulaire">
                    <span>Modifier le formulaire</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a href="{{ route('field.index', $event_uid) }}" class="nav-link" data-event_menu_path="field">
                <i class="fa-solid fa-pen"></i>
                <span>Champ libre</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('event.edit', $event_uid) }}" class="nav-link" data-event_menu_path="field">
                <i class="fa-solid fa-edit"></i>
                <span>Modifier l'évènement</span>
            </a>
        </li>

    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('show_event_form', $event_uid) }}" target="_blank" class="nav-link">
        <i class="fa-solid fa-eye"></i>
        <span>Aperçu du formulaire</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('app.bulkmailing_index', $event_uid) }}" class="nav-link" data-event_menu_path="bulkmailing">
        <i class="fa-solid fa-envelope"></i>
        <span>Envoi de mail</span>
    </a>
</li>
