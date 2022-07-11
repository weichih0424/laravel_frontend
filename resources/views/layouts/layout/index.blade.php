<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$header}}</title>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/base.css') }}"> --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
        @yield("meta")
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    </head>
    <body>
        <header>
            @include('layouts.nav')
        </header>
            <div class="main">
                @yield("main")
            </div>
        <div class="footer">
            @include('layouts.footer')
        </div>
    </body>
</html>
@yield("js")
@yield("script")