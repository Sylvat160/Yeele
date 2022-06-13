<div class="pt-2 mb-2 d-flex justify-content-center align-items-center formule bg-info rounded">
    <h6>Menu de l'évènement</h6>
</div>
<li class="nav-item">
    <a href="{{ route('event_price.index', $event_uid) }}" class="nav-link" data-event_menu_path="event_price">
        <i class="fa-solid fa-money-bill"></i>
        <span>Tarifs</span>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-users"></i>
        <span>Liste des inscrits</span>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-credit-card"></i>
        <span>Modes de paiement</span>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-envelope"></i>
        <span>Envoi de mail</span>
    </a>
</li>