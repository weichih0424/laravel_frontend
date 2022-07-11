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

@foreach ($articles as $key => $item)
<div class="category__title"><p>{{ $articles[$key]->name }}</p></div>
    @foreach ($item->url as $key2 => $article)
    <?=$key2%3==0?"<ul class='list-group list-group-horizontal-lg'>":''?>
        <li class="list-group-item">
            <a href="/article/{{ $articles[$key]->en_name }}/{{ $article->id }}">
            <div class="img card"><img src="{{ $article->image }}" class="article_img rounded mx-auto d-block"></div>
            <div class="txt"><h5>{{ $article->name }}</h5></div></a>
            <div class="time"><p>{{ $article->created_at }}</p></div>
        </li>
    <?=($key2%3==2)?'</ul>':''?>
    @endforeach
    <div class="c-link"><a href="/article/{{ $articles[$key]->en_name }}">看更多</a></div>
@endforeach
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