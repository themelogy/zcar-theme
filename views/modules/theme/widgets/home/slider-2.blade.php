@php
    $slideCount = $slides->count();
    $cars       = app(\Modules\Carrental\Repositories\CarRepository::class)->all()->where('settings.show_banner', 1)->take($slideCount)->getIterator();
    static $i = 0;
    $slides->each(function (&$slide) use (&$cars, &$i) {
        if($cars->count()>0) {
            $slide->car = $i == 0 ? current($cars) : next($cars);
            $i++;
        }
        return $slide;
    });
@endphp

<div class="r-slider r-slider-02">
    <div class="r-slider owl-carousel" id="defaultHomeSlider">
        @foreach($slides as $slide)
        <div class="r-slider-item" style="background: url({!! $slide->present()->firstImage(1920,700,'fit',50) !!})">
            @isset($slide->car)
                <div class="container">
                    <div class="r-slider-top-content float-right text-left">
                        <img src="{{ $slide->car->present()->firstImage(500,null,'resize',50) }}" alt="{{ $slide->car->fullname }}" />
                        <h4 class="mb-3">{!! trans('themes::carrental.title.start price', ['price'=>$slide->car->prices->price6]) !!}</h4>
                        <h2 class="mb-3"><b class="text-theme-color">{{ $slide->car->fullname }}</b></h2>
                        <ul class="pl-0 mb-4">
                            <li><i class="fa fa-car"></i><span>{{ $slide->car->present()->body_type }}</span></li>
                            <li><i class="fa fa-cogs"></i><span>{{ $slide->car->present()->transmission }}</span></li>
                            <li><i class="fa fa-beer"></i><span>{{ $slide->car->present()->fuel_type }}</span></li>
                            <li><i class="fa fa-suitcase"></i><span>{{ $slide->car->series->baggage }}</span></li>
                        </ul>
                    </div>
                </div>
            @endisset
        </div>
        @endforeach
    </div>
</div>
