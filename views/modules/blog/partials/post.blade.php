<article class="col-lg-6 col-md-12 col-12">
    <div class="post">
        <div class="post-header">
            <a href="{{ $post->url }}" class="img-hover">
                <img class="img-fluid img-thumbnail" src="{{ $post->present()->firstImage(500,250,'fit',80) }}" alt="{{ $post->title }}">
                <i class="fa fa-link box-icon-# hover-icon round"></i>
            </a>
        </div>
        <div class="post-inner">
            <ul class="post-meta">
                @isset($post->category->url)
                    <li><i class="fa fa-th-large"></i> <a href="{{ $post->category->url }}">{{ $post->category->name }}</a></li>
                @endisset
                <li><i class="fa fa-calendar"></i> <a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a></li>
            </ul>
            <h3 class="title"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
            <div class="description">
                <p>{{ strip_tags($post->intro) }}</p>
            </div>
        </div>
    </div>
</article>
