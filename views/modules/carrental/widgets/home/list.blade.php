<section id="r-best-offer">
    <div class="r-best-vehicles" style="background-color: rgba(251, 251, 251, 0.64)">
        <div class="r-sec-head r-accent-color r-sec-head-v">
            <span>{!! trans('themes::carrental.title.featured cars title') !!}</span>
            <h2>{!! trans('themes::carrental.title.featured cars desc') !!}</h2>
        </div>
        <div class="container">
            <div class="row clearfix r-best-offer-list owl-theme owl-carousel" id="r-best-offers">
                @foreach($cars as $car)
                    <div class="">
                        <div class="r-best-offer-single">
                            <div class="r-best-offer-in">
                                <div class="r-offer-img">
                                    <a class="d-inline-block" href="{{ $car->url }}"><img src="{{ $car->present()->firstImage(240,null,'resize',50) }}" class="img-fluid d-block m-auto" alt="{{ $car->fullname }}"></a>
                                    <div class="r-offer-img-over">
                                        <a href="{{ $car->url }}"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="r-best-offer-content">
                                    <a href="{{ $car->url }}">{{ $car->fullname }}</a>
                                    <p>{!! trans('themes::carrental.title.start price', ['price'=>$car->prices->price6]) !!}</p>
                                    <ul class="pl-0 mb-0">
                                        <li><i class="fa fa-car"></i><span>{{ $car->present()->body_type }}</span></li>
                                        <li><i class="fa fa-cogs"></i><span>{{ $car->present()->transmission }}</span></li>
                                        <li><i class="fa fa-beer"></i><span>{{ $car->present()->fuel_type }}</span></li>
                                        <li><i class="fa fa-suitcase"></i><span>{{ $car->series->baggage }}</span></li>
                                    </ul>
                                </div>
                                <div class="r-offer-rewst-this">
                                    <a href="{{ $car->url }}">
                                        <span class="text-uppercase">{{ trans('themes::carrental.buttons.reservation') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
