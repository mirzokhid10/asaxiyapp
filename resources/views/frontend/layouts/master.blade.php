<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swipper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/authchoice.css') }}">

    {{-- Swiper CSS Links --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    {{-- Notification Lib Css Link --}}
    @notifyCss

</head>

<body>
    <!--============================
            HEADER START
        ==============================-->
    @include('frontend.layouts.header')
    <!--============================
            HEADER END
        ==============================-->

    <!--============================
            MAIN MENU START
        ==============================-->
    @include('frontend.layouts.menu')
    <!--============================
            MOBILE MENU END
        ==============================-->

    <!--============================
            Main Content Start
        ==============================-->

    @yield('content')

    <!--============================
        Main Content End
        ==============================-->

    {{-- <!--============================
            FEATURES PART START
    ==============================--> --}}
    @include('frontend.layouts.features')
    {{-- <!--============================
                FEATURES PART END
    ==============================--> --}}

    <!--============================
            FOOTER PART START
        ==============================-->
    @include('frontend.layouts.footer')
    <!--============================
            FOOTER PART END
        ==============================-->

    @include('auth.login')

    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/countdown.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-fancybox.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-nice-select.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-pjax.js') }}"></script>
    <script src="{{ asset('frontend/js/lazyload.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    {{-- Swiper JS Link --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    {{-- Notification Lib JS Link --}}
    <x-notify::notify />
    @notifyJs

    @include('frontend.layouts.scripts')
    @stack('scripts')
</body>

</html>
