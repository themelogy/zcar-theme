<div id="r-gallery-part">
    <div class="r-gallery-part r-gallery-part-home py-0">
        <ul class="clearfix">
            @foreach($posts as $post)
            <li>
                <a rel="nofollow" href="{{ $post->image }}" data-rel="lightcase:myCollection">
                    <img src="{{ $post->image }}" class="d-block img-fluid" alt="{{ str_sentence(@$post->caption->text, 1) }}">
                    <div class="gallery-hover">
                        <div class="gallery-text">
                            <div class="icon-gallery"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
