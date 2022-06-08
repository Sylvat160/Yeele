<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link d-lg-none" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('website.home') }}" class="nav-link">Accueil</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('website.contact') }}" class="nav-link">Contact</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item dropdown">
            <a class="nav-link mr-2 bg-light border rounded-pill" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
              <span>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border: .1px solid #f8f8f8 !important;">
              <a href="#" class="dropdown-item">
                  <i class="ion-edit"></i>
                  <span>Modifier ses informations</span>
              </a>
              <form action="{{ route('app.logout') }}" method="POST">
                  @csrf
                <button type="submit" class="dropdown-item">
                    <i class="ion-log-out"></i>
                    <span>Se déconnecter</span>
                </button>
              </form>
          </li>
      </ul>
</nav>
<!-- /.navbar -->
