<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center border-0">
      <img src="{{ asset('logo.png') }}" alt="Yeele" width="100" height="40">
    </a>
    @can('client')
    @include('extras.formule_status')
    @endcan

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="min-height: 95vh !important;">
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
          @can('admin')
          <li class="nav-item pl-2">
              <a href="#" class="nav-link">
              <i class="fas fa-calendar-week"></i>

                  <span>Evenements</span>
                  <i class="fas fa-angle-left right"></i>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('events-current')}}" class="nav-link" data-event_menu_path="admin/evenement/en_cours">
                      <i class="fas fa-calendar-day"></i>
                          <span> En cours </span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('events-end')}}" class="nav-link" data-event_menu_path="admin/evenement/termines">
                      <i class="fas fa-calendar-check"></i>
                          <span> Terminés </span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('events-upcoming')}}" class="nav-link" data-event_menu_path="admin/evenement/a_venir">
                      <i class="fas fa-calendar-plus"></i>
                          <span> A venir </span>
                      </a>
                  </li>
              </ul>
          </li>
          @endcan
          @can('client')
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
          @else
          <li class="nav-item">
              <a href="{{ route('event.index') }}" class="nav-link" data-path="app/event">
                  <i class="nav-icon fas fa-calendar"></i>
                  <p>Tous mes évènements</p>
              </a>
          </li>
          

          @endcan

          
          
          
          @includeWhen($show_event_menu, 'extras.event_menu')
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>