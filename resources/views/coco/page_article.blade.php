@extends('layout.index')

@section('main')
    <div class="container">
        {{-- @include('layout.category') --}}
        {{-- menu nav --}}
        <div class="bd-highlight mb-3 h4">
            <ul class='row row-cols-auto border rounded-3'style="background-color:#EDEDED">
                <li class='col'>
                    <div class="p-2 bd-highlight">
                        <a href="/article">文章首頁</a>
                    </div>
                </li>
                @foreach ($categorys as $category)
                <li class='col'>
                    <div class="p-2 bd-highlight">
                        <form action="/article/{{$category->url}}" id="category_form" method="POST">
                            @csrf
                            <input type="submit" name="category_name" value="{{$category->name}}">
                        </form>
                        {{-- <form id="category_name">
                            <input type="hidden" name="category_name" value="{{$category->name}}">
                            <a href="/article/{{$category->url}}">{{ $category->name }}</a>
                        </form> --}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
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
@stop

@section("script")
<script>
    // alert("123");
</script>