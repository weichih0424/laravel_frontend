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
        <div class="wrapper">
            <div class="main">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="content_left col-10">
                            <h1>Welcome</h1>
                            @include('layout.article')
                        </div>
                        <div class="content_right col-2">
                            <h1>Welcome</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='footer'>
            @include('layout.footer')
        </div>
    </body>
</html>