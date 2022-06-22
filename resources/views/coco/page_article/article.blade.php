@extends('coco.page_article.layout.page_article')

@section('content_left')
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
    {!! $articles->links() !!}
@stop
{{-- <ul class="list-group list-group-horizontal-sm" width='750px' height="200px">
    <li class="list-group-item">
        <img src="http://127.0.0.1:8000/storage/coco/uploads/CocoArticle/b74e795b879fa29fde5830fdb116cdd5.jpg" width='230px' height="130px">
        <div class="txt">
            <h5>123</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/6103.jpg_wh300.jpg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>456</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/123123123.jpeg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>789</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
</ul>
<ul class="list-group list-group-horizontal-sm"  width='750px' height="200px">
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/5289.jpg_wh300.jpg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>123</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/6103.jpg_wh300.jpg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>456</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/123123123.jpeg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>789</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
</ul>
<ul class="list-group list-group-horizontal-sm"  width='750px' height="200px">
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/5289.jpg_wh300.jpg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>123</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/6103.jpg_wh300.jpg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>456</h5>
        </div>
        <div class="time">
            <p>2022/05/04 12:59</p>
        </div>
    </li>
    <li class="list-group-item">
        <img src="{{ URL::asset('storage/image/123123123.jpeg') }}" width='230px' height="130px">
        <div class="txt">
            <h5>789</h5>
        </div>
        <div class="time">
            <a href="https://www.youtube.com/">
            <p>2022/05/04 12:59</p>
        </a>
        </div>
    </li>
</ul> --}}