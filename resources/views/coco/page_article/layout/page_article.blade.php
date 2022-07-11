@extends('layouts.layout.index')

@section('main')
@yield("hero_section")
    <div class="container">
        {{-- menu nav --}}
        <div class="bd-highlight mb-3 h4">
            <ul class='row row-cols-auto border rounded-3'style="background-color:#EDEDED">
                <li class='col'>
                    <div class="p-2 bd-highlight show_article fw-bold">
                        <a href="/article">文章首頁</a>
                    </div>
                </li>
                @foreach ($categorys as $category)
                <li class='col'>
                    <div class="p-2 bd-highlight category show_article">
                        <a href="/article/{{$category->url}}" id="{{$category->url}}" data-value="{{$category->url}}">{{$category->name}}</a>
                        {{-- <form action="/article/{{$category->url}}" id="category_form" method="POST">
                            @csrf
                            <input type="submit" name="category_name" class="category_submit fw-bold" value="{{$category->name}}">
                        </form> --}}
                        
                        {{-- <a href="/article/food" id="food" data-value="1">美食</a>
                        <a href="/article/drink" id="drink" data-value="2">飲品</a>
                        <a href="/article/sport" id="sport" data-value="3">運動</a> --}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="content_left col-9">
                @yield("content_left")
            </div>
            <div class="content_right col-3">
                {{-- <h1>Welcome</h1> --}}
                @include('coco.page_article.right_bar.index')
            </div>
        </div>
    </div>
@stop

@section("script")
<script>
// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
// $(document).ready(function() {
//     // $("#{{$category->url}}").click(function(e){
//         $(".category a").click(function(e){
//         e.preventDefault();
//         var category_url = $(this).data('value')
//         console.log(category_url);
//         // alert(category_url);
//         $.ajax({
//             type: 'POST',
//             url: "/article"+"/"+category_url,
//             data: {'category_name': category_url},


//             success: function (response) {
//                 alert("OK");
//                 window.location.href="/article"+"/"+category_url;
//             },
//             error: function (jqXHR,textStatus,errorThrown) {
//                 alert("NO");
//                 console.log(jqXHR)
//             }
//         });
//     });
// });
</script>
@endsection