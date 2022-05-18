<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$header}}</title>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <header>
            @include('layout.nav')
        </header>
        {{-- <div class="wrapper"> --}}
            <div class="main">
                @yield("main")
            </div>
        {{-- </div> --}}
        <div class='footer'>
            @include('layout.footer')
        </div>
    </body>
</html>