<!--

=========================================================
* Argon Dashboard - v1.1.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title')
  </title>
  <!-- Favicon -->
  <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
  <!-- Data table -->
  <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
  <!-- swall -->
  <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">

</head>

<body class="">
  <!-- sidebar -->
    @include('partials.sidebar')
  <!-- End sidebar -->
  <div class="main-content">
    <!-- Navbar -->
    @include('partials.navbar')
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
      <!-- @include('partials.cardstats') -->
      </div>
    </div>
    <div class="container-fluid mt--7">
     @include('partials.contents')
    </div>
  </div>

  @include('partials.scriptjs')
</body>

</html>