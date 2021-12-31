<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bangdu Futsal</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('userbackend/panel/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('userbackend/panel/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('userbackend/panel/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('userbackend/panel/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('userbackend/panel/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('userbackend/panel/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('userbackend/panel/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="{{asset('userbackend/panel/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('userbackend/panel/assets/css/multi_steps_form.css')}}" rel="stylesheet">



</head>

<body>
    @php

    $route = Route::current()->getName();

    @endphp

    @include('user.body.top-header')

    @include('user.body.navigation')

    <main id="main">

        @includeWhen($route == 'dashboard','user.body.slider')

        @yield('user')

    </main>

    @include('user.body.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('userbackend/panel/assets/vendor/purecounter/purecounter.js')}}">
    </script>
    <script src="{{asset('userbackend/panel/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('userbackend/panel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('userbackend/panel/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('userbackend/panel/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('userbackend/panel/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('userbackend/panel/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('userbackend/panel/assets/js/main.js')}}"></script>

</body>

</html>