<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center border-0">
      <img src="{{ asset('logo.png') }}" alt="Yeele" width="100" height="40">
    </a>
    <div class="pt-2 d-flex justify-content-center align-items-center formule bg-green">
      <h6>Formule actuelle: <span class="font-weight-bold">Free</span></h6>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link" data-path="app">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Tableau de bord</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('event.create') }}" class="nav-link" data-path="app">
              <i class="nav-icon fas fa-plus"></i>
              <p>Créer un évènement</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('event.index') }}" class="nav-link" data-path="app">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Tous les évènements</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-path="app">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Mes commandes</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-path="app">
              <i class="nav-icon fas fa-square-plus"></i>
              <p>Commande future</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-path="app">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>Effectuer un paiement</p>
              </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>