<section id="r-faq-section">
    <div class="r-faq-section r-faq-white-bg">
        <div class="container">
            <div class="row v-align-center r-faq-header-wrapper">
                <div class="col-md-8 col-sm-12">
                    <div class="r-faq-header">
                        <span>{!! trans('themes::faq.home.desc') !!}</span>
                        <h2>{!! trans('themes::faq.home.title') !!}</h2>
                    </div>
                </div>
            </div>

            <div class="row r-faq-accordion-wrapper">
                @foreach($faqs->chunk(5) as $chunk)
                <div class="col-lg-6 col-md-12">
                    @foreach($chunk as $faq)
                    <div class="r-accordion">
                        <div class="r-accordion-heading">
                        <span class="r-accordion-toggle">
                          <i class="fa-arrow-circle-down fa"></i>
                        </span>
                            <a class="text-theme-color" href="{{ $faq->url }}">{{ $faq->title }}</a>
                        </div>
                        <div class="r-accordion-body">
                            <p>
                                {!! $faq->content !!}
                            </p>
                        </div>
                    </div> <!-- /r-accordion -->
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
