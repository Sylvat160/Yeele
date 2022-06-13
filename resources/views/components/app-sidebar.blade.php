<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center border-0">
      <img src="{{ asset('logo.png') }}" alt="Yeele" width="100" height="40">
    </a>
    
    @include('extras.formule_status')

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('app.home') }}" class="nav-link" data-path="app">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Tableau de bord</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('event.create') }}" class="nav-link" data-path="app/event/create">
              <i class="nav-icon fas fa-plus"></i>
              <p>Créer un évènement</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('event.index') }}" class="nav-link" data-path="app/event">
              <i class="nav-icon fas fa-calendar"></i>
              <p>Tous les évènements</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('command.index') }}" class="nav-link" data-path="app/command">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Mes commandes</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('command.create') }}" class="nav-link" data-path="app/command/create">
              <i class="nav-icon fas fa-square-plus"></i>
              <p>Nouvelle Commande</p>
              </a>
          </li>
           @includeWhen($show_event_menu, 'extras.event_menu')
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>