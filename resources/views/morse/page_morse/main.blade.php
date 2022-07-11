@extends('layouts.layout.index')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('main')
<h3>摩斯密碼</h3>
{{-- <iframe src="https://www.matools.com/morse?embed" 
    width="100%" height="500%" scrolling="no" style="border:0px;">
</iframe>   --}}
<div class="container"> 
    <div class="form-group">
        <label for="txt">明文</label>
        <textarea class="form-control" id="txt" rows="4" style="width: 20%"></textarea>
    </div>
    <button type="button" class="btn btn-primary" id="Submit_encode" style="width: 5%">加密</button>
    <button type="button" class="btn btn-primary" id="Submit_decode" style="width: 5%">解密</button>
    <div class="form-group">
        <label for="morse">摩斯密碼</label>
        <textarea class="form-control" id="morse" rows="4" style="width: 20%"></textarea>
    </div>
</div>
@stop
@section("script")
<script>
    // alert(document.getElementById('txt').value);
    // $('#Submit').click(function(){
    // const txt = document.getElementById('txt').value;
    // const morse = document.getElementById('morse').value;
    // });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#Submit_encode').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "/morse/post_encode",
            type: "POST",
            data: JSON.stringify({
                "txt": $('#txt').val()
                }),
            dataType: "json",
            contentType: "application/json; charset=UTF-8", //註解
            success: function(data) {
                console.log(data);
                document.getElementById("morse").value = '';
                document.getElementById("morse").value = data;
            },
            error: function (jqXHR,textStatus,errorThrown) {
                console.log(jqXHR)
            }
        });
    })
    $('#Submit_decode').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "/morse/post_decode",
            type: "POST",
            data: JSON.stringify({
                "morse": $('#morse').val()
                }),
            dataType: "json",
            contentType: "application/json; charset=UTF-8", //註解
            success: function(data) {
                console.log(data);
                document.getElementById("txt").value = '';
                document.getElementById("txt").value = data;
            },
            error: function (jqXHR,textStatus,errorThrown) {
                console.log(jqXHR)
            }
        });
    })
</script>
@endsection
