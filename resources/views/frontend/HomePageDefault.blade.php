<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="{{ asset('assets/img/brand/Book.png') }}" rel="icon" type="image/png" type="image/png" />
    <title>E-Library</title>
    <!-- Bootstrap CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Icons -->
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
      
      @include('frontend.partials.HomePage.Header')

    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    
      @include('frontend.partials.HomePage.HomeBanner')

    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    
      @include('frontend.partials.HomePage.Feature')

    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
      
      @include('frontend.partials.HomePage.PopularCourse')


    <!--================ End Popular Courses Area =================-->

    <!--================ Start footer Area  =================-->
    
    @include('frontend.partials.HomePage.Footer')


    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <!--   Core   -->
    <script src="{{ asset('assets/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
  </body>
</html>
