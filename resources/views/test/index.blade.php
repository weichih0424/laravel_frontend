<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IM Warehouse</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/test/css/materialize.min.css') }}"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="teal darken-1">
<div class="row">
    <div class="col s12 m4 offset-m4" style="margin-top:150px;font-family:微軟正黑體, sans-serif;">
    <div class="card">
        <div class="card-content hoverable">

        {{-- <form id="log-form"  action="/test" method="POST"> --}}
        <form id="log-form">
            <div class="row">
            <div class="input-field col m8 offset-m2 s12">
                <input id="log-id" name="log-id" type="text" class="validate" pattern="\S+">
                <label>帳號</label>
            </div>
            </div>
            <div class="row">
            <div class="input-field col m8 offset-m2 s12">
                <input id="log-pwd" name="log-pwd" type="password" class="validate" pattern="\S+">
                <label>密碼</label>
            </div>
            </div>
            <input id="real-btn" type="submit" name="real-btn" value="" hidden="true">
            <div class="row">
            <div class="input-field col s12" style="text-align: center;">
                {{-- <a class="waves-effect waves-light btn" onclick="login()">登入</a> --}}
                <button class="waves-effect waves-light btn">登入</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ asset('js/test/js/materialize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/test/js/login.js') }}"></script>
</body>
</html>