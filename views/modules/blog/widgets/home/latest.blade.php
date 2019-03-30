<section id="r-latest-news">
    <div class="r-latest-news r-latest-news-light" style="background-color: #f8f8f8">
        <div class="r-sec-head r-sec-head-b">
            <h2><b>Araç Kiralama</b> Blog</h2>
        </div>
        <div class="container">
            <div class="owl-carousel r-latest-news-list" id="r-latest-news-slider">
                @foreach($posts as $post)
                <div class="r-latest-news-single">
                    <a href="{{ $post->url }}" class="d-inline-block">
                        <img src="{{ $post->present()->firstImage(350,200,'fit',80) }}" class="img-fluid d-block m-auto" alt="{{ $post->title }}">
                    </a>
                    <div class="r-latest-news-content">
                        <span class="r-date">{{ $post->created_at->formatLocalized('%d %B %Y') }}</span>
                        <h4><a href="{{ $post->url }}">{{ $post->title }}</a></h4>
                        <a href="{{ $post->url }}" class="r-read-more">{{ trans('global.buttons.read more') }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
