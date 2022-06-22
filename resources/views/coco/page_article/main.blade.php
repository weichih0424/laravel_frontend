@extends('coco.page_article.layout.page_article')

@section('hero_section')
    <div class="kv">
        <div class="kv__carousel owl-carousel">
            {{-- <img src="/storage/image/carousel_left.svg" alt="img1" /> --}}
            <a class="kv__slider" href="https://graphics.tvbs.com.tw/redirect/supertaste/supertaste_Sindexbanner.html" target="_new">
                <img src="{{ URL::asset('storage/image/carousel_item1.jpeg') }}" alt="img1" />
            </a>
            <a class="kv__slider" href="https://supertaste.tvbs.com.tw/exhibition/dajiamazu/index.html" target="_new">
                <img src="{{ URL::asset('storage/image/carousel_item2.jpeg') }}" alt="img1" />
            </a>
            <a class="kv__slider" href="https://supertaste.tvbs.com.tw/pack/336010" target="_new">
                <img src="{{ URL::asset('storage/image/carousel_item3.jpeg') }}" alt="img1" />
            </a>
            <a class="kv__slider" href="https://supertaste.tvbs.com.tw/review" target="_new">
                <img src="{{ URL::asset('storage/image/carousel_item4.jpeg') }}" alt="img1" />
            </a>
        </div>
        <div id="counter" class="kv__counter"></div>
        <div class="kv__overlay overlay">
            <div class="overlay__left"><img src="{{ URL::asset('storage/image/carousel_left.svg') }}"/></div>
            <div class="overlay__right"><img src="{{ URL::asset('storage/image/carousel_right.svg') }}"/></div>
        </div>
    </div>
@endsection





@section('content_left')

                                                    {{-- 美食 --}}
    <div class="category__title"><p>美食</p></div>
    <div class="show_article">
        @foreach ($articles_food as $key => $article_food)
            <?=$key%3==0?"<ul class='list-group list-group-horizontal-lg'>":''?>
                <li class="list-group-item">
                    <a href="/article/food/{{$article_food->id}}">
                    <div class="img card"><img src="{{ $article_food->image }}" class="article_img rounded mx-auto d-block"></div>
                    <div class="txt"><h5>{{ $article_food->name }}</h5></div></a>
                    <div class="time"><p>{{ $article_food->created_at }}</p></div>
                </li>
            <?=($key%3==2)?'</ul>':''?>
        @endforeach
    </div>
    <div class="c-link"><a href="/article/food">看更多</a></div>
                                                    {{-- 飲品 --}}
    <div class="category__title"><p>飲品</p></div>
    <div class="show_article">
        @foreach ($articles_drink as $key => $article_drink)
            <?=$key%3==0?"<ul class='list-group list-group-horizontal-lg'>":''?>
                <li class="list-group-item">
                    <a href="/article/drink/{{$article_drink->id}}">
                    <div class="img card"><img src="{{ $article_drink->image }}" class="article_img rounded mx-auto d-block"></div>
                    <div class="txt"><h5>{{ $article_drink->name }}</h5></div></a>
                    <div class="time"><p>{{ $article_drink->created_at }}</p></div>
                </li>
            <?=($key%3==2)?'</ul>':''?>
        @endforeach
    </div>
    <div class="c-link"><a href="/article/drink">看更多</a></div>
                                                    {{-- 運動 --}}
    <div class="category__title"><p>運動</p></div>
    <div class="show_article">
        @foreach ($articles_sport as $key => $article_sport)
            <?=$key%3==0?"<ul class='list-group list-group-horizontal-lg'>":''?>
                <li class="list-group-item">
                    <a href="/article/sport/{{$article_sport->id}}">
                    <div class="img card"><img src="{{ $article_sport->image }}" class="article_img rounded mx-auto d-block"></div>
                    <div class="txt"><h5>{{ $article_sport->name }}</h5></div></a>
                    <div class="time"><p>{{ $article_sport->created_at }}</p></div>
                </li>
            <?=($key%3==2)?'</ul>':''?>
        @endforeach
    </div>
    <div class="c-link"><a href="/article/sport">看更多</a></div>
@stop

@section("script")
<script>
$(function () {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        center: true,
        autoplay: 2000,
        items: 2,
        nav: false,
        loop: true,
        dots: false,
        onInitialized: counter, //When the plugin has initialized.
        onTranslated: counter, //When the translation of the stage has finished.
    });
    function counter(event) {
        var element = event.target;         // DOM element, in this example .owl-carousel
        var items = event.item.count;     // Number of items
        var item = event.item.index + 1;     // Position of the current item

        // it loop is true then reset counter from 1
        if (item > items) {
            item = item - items
        }
        $('#counter').html(item + " / " + items)
    }
    $('.overlay__right').click(() => owl.trigger('next.owl.carousel'))
    $('.overlay__left').click(() => owl.trigger('prev.owl.carousel'))
});
</script>
@endsection