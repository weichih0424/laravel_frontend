@extends('coco.page_article.layout.page_article')

@section('content_left')
@foreach ($datas as $key => $data)
    <h1 class="mt-5 fw-bolder">{{ $data->name }}</h1>
    <h6 class="mt-3 text-secondary">{{ $data->created_at }}</h6>
    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 90%;">
    <img src="{{ $data->image }}" style="width: 80%;">
    <div class="mt-4 article_content">
        {!! $data->intro !!}
    </div>
@endforeach
    <hr class="deep_line accent-2 mb-4 mt-0 d-inline-block mx-auto">
    <h1 class="mt-5 fw-bolder">其他文章</h1>
    <div class="show_article">
        @foreach ($other_articles as $key => $other_article)
            <?=$key%3==0?"<ul class='list-group list-group-horizontal-lg'>":''?>
                <li class="list-group-item">
                    <a href="/article/{{ $category_url }}/{{ $other_article->id }}">
                    <div class="img card"><img src="{{ $other_article->image }}" class="article_img rounded mx-auto d-block"></div>
                    <div class="txt"><h5>{{ $other_article->name }}</h5></div></a>
                    <div class="time"><p>{{ $other_article->created_at }}</p></div>
                </li>
            <?=($key%3==2)?'</ul>':''?>
        @endforeach
    </div>
@stop