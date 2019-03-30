<div class="card">
    <div class="card-header" id="heading{{ $loop->iteration }}">
        <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}">
                {{ $faq->title }}
            </button>
        </h5>
    </div>

    <div id="collapse{{ $loop->iteration }}" class="collapse{{ $loop->first ? ' show': '' }}" aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordion">
        <div class="card-body">
            {!! $faq->content !!}
        </div>
    </div>
</div>
