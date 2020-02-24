<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand" href="./index.html">
        <img src="{{ asset('assets/img/brand/library.jpg') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">{{ auth()->user()->name }}</h6>
              </div>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Profile</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Keluar</span>
              </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="{{ asset('assets/img/brand/library.jpg') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <?php $urlCurrent = Route::currentRouteName(); 
        $urls = explode('.', $urlCurrent);
        $url = end($urls);
        ?>

        @if ($url == "dashboard")
         <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="#">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url()->route('admin.penulis') }}">
              <i class="ni ni-planet text-blue"></i> Penulis
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url()->route('admin.buku') }}">
              <i class="ni ni-books text-orange"></i>Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i>Profile
            </a>
          </li>
        </ul>
        @elseif ($url == "penulis")
         <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url()->route('admin.dashboard') }}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="{{ url()->route('admin.penulis') }}">
              <i class="ni ni-planet text-blue"></i> Penulis
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url()->route('admin.buku') }}">
              <i class="ni ni-books text-orange"></i>Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i>Profile
            </a>
          </li>
        </ul>
        @elseif ($url == "buku") 
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url()->route('admin.penulis') }}">
              <i class="ni ni-planet text-blue"></i> Penulis
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="{{ url()->route('admin.buku') }}">
              <i class="ni ni-books text-orange"></i>Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i>Profile
            </a>
          </li>
        </ul>
        @elseif ($url == "profile")
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url()->route('admin.penulis') }}">
              <i class="ni ni-planet text-blue"></i> Penulis
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ url()->route('admin.buku') }}">
              <i class="ni ni-books text-orange"></i>Buku
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="./examples/profile.html">
              <i class="ni ni-single-02 text-yellow"></i>Profile
            </a>
          </li>
        </ul>
        @endif
       
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Keluar</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
            >

              <i class="ni ni-user-run"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>