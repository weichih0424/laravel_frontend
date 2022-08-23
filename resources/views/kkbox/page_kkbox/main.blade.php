@extends('layouts.layout.index')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />
<script type="text/javascript" src="{{ URL::asset('/js/kkbox.js') }}"></script>
@stop
@section('main')
<h3>KKBOX</h3>
{{-- <iframe src="https://widget.kkbox.com/v1/?id=0pp0TYF1MinpWHxuUo&type=song&terr=TW&lang=TC" allow="autoplay"> --}}
{{-- <button class="btn btn-primary" id="chart_playlists" style="width: 5%">排行榜</button> --}}
<div class="container bg-primary p-5">
    <div class="theme">
        <div>
            <h2>新歌</h2>
        </div>
        <div class="slider" id="new_song">
            {{-- 
            <div id="row"><h3>1</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            <div id="row"><h3>2</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            <div id="row"><h3>3</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            <div id="row"><h3>4</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            <div id="row"><h3>5</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            <div id="row"><h3>6</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            <div id="row"><h3>7</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            <div id="row"><h3>8</h3><img src="https://picsum.photos/200/200/?random=1" alt=""></div>
            --}}
        </div>
    </div>
    <div class="theme">
        <div>
            <h2>單曲</h2>
        </div>
        <div class="slider" id="single">
        </div>
    </div>
    <iframe width="350" height="100" id="iframe_player" src=""></iframe>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
@stop
@section("css")
<link rel="stylesheet" href="{{URL::asset('/css/kkbox.css')}}">
@stop
@section("js")


@stop
@section("script")
<script>
    ajax_chart_playlists();
</script>
@endsection

