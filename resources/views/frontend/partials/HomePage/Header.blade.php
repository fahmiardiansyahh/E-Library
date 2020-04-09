<header class="header_area">
      <div class="main_menu">
        <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Search Here"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{ route('root') }}"
              ><img src="{{ asset('assets/img/brand/resizelibrary.png') }}" alt="navbar-logo" class="img-fluid" 
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
            @guest
              <ul class="nav navbar-nav menu_nav ml-auto">
  
              <?php  

              $urlCurrent = Route::currentRouteName();
              $urls = explode('.', $urlCurrent);
              $url = end($urls);
              ?>

              @if($url == "root")

                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('root') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>

              @elseif($url == "books")

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('root') }}">Home</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
              @elseif($url == "contact")
              
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('root') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                
              @elseif($url == "about")
                
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('root') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
               @elseif($url == "details")

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('root') }}">Home</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>

              @endif


                
              <!--   <li class="nav-item">
                  <a href="#" class="nav-link search" id="search">
                    <i class="ti-search"></i>
                  </a>
                </li> -->
              </ul>
            @endguest

            
            @auth
                
              <ul class="nav navbar-nav menu_nav ml-auto">
  
              <?php  

              $urlCurrent = Route::currentRouteName();
              $urls = explode('.', $urlCurrent);
              $url = end($urls);
              ?>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>

              @if($url == "home")

                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="ti-user mr-2"></i>{{ auth()->user()->name }}</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" 
                        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                        >Logout</a>
                    </li>
                  </ul>
                </li>

              @elseif($url == "books")

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('books') }}">Books</a>
                </li>

                 <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="ti-user mr-2"></i>{{ auth()->user()->name }}</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                        >Logout</a>
                    </li>
                  </ul>
                </li>
               
        
               @elseif($url == "details")

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Books</a>
                </li>
                 <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    ><i class="ti-user mr-2"></i>{{ auth()->user()->name }}</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                        >Logout</a>
                    </li>
                  </ul>
                </li>
               

              @endif


                
              <!--   <li class="nav-item">
                  <a href="#" class="nav-link search" id="search">
                    <i class="ti-search"></i>
                  </a>
                </li> -->
              </ul>


            @endauth


            </div>
          </div>
        </nav>
      </div>
    </header>