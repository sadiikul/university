<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="State University">
    <meta name="keywords" content="@yield('meta_tag')">
    <meta name="description" content="@yield('meta_desc')">
    <title>@yield('title') {{ $seos->title }}</title>
    @yield('rel')
    <link rel="icon" type="image/x-icon" href="{{ asset($logos->fav) }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font.google.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/lc_lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/minimal.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}">
    {!! $customs->head !!}
    <style>
        :root {
            --green: {{ $contents->theme }};
        }

        .toast {
            opacity: 1 !important;
        }
    </style>
</head>

<body>
    {!! $customs->body_start !!}
    {{-- Header section --}}
    @include('frontend.partials.navbar')

    {{-- Main Body --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Section --}}
    @include('frontend.partials.footer')

    <!-- script -->
    <script src="{{ asset('assets/frontend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/lc_lightbox.lite.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/alloy_finger.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>
    {!! $customs->body_end !!}
    {!! Toastr::message() !!}
    <script>
        // swipper slider
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: @if ($contents->slide == 1)
                true
            @else
                false
            @endif ,
            effect: "fade",
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</body>

</html>
