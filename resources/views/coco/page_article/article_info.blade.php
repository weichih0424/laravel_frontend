@extends('coco.page_article.layout.page_article')

@section('content_left')
    <h1 class="mt-5 fw-bolder">我是文章title</h1>
    <h6 class="mt-3 text-secondary">2022/05/23 14:43</h6>
    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 100%;">
    <img src="http://127.0.0.1:8000/storage/coco/uploads/CocoArticle/b74e795b879fa29fde5830fdb116cdd5.jpg">
    <div class="mt-4 article_content">
        @foreach ($datas as $key => $data)
        {!! $data->intro !!}
        @endforeach
    </div>
    <hr class="deep_line accent-2 mb-4 mt-0 d-inline-block mx-auto">
    <h1 class="mt-5 fw-bolder">其他文章</h1>
    <div class="show_article">
        @foreach ($articles as $key => $data)
            <?=$key%3==0?"<ul class='list-group list-group-horizontal-lg'>":''?>
                <li class="list-group-item">
                    <a href="/article/{{ $category_url }}/{{ $data->id }}">
                    <div class="img card"><img src="{{ $data->image }}" class="article_img rounded mx-auto d-block"></div>
                    <div class="txt"><h5>{{ $data->name }}</h5></div></a>
                    <div class="time"><p>{{ $data->created_at }}</p></div>
                </li>
            <?=($key%3==2)?'</ul>':''?>
        @endforeach
    </div>
@stop