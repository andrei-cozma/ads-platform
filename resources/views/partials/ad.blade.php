<div class="row mb-2">
    <div class="col-md-3">
        <a href="{{ route('ads.show', $ad->id) }}">
            <div class="image">
                <img class="img-fluid" src="{{ asset('storage/' . $ad->mainImage->name) }}" alt="{{ $ad->name }}">
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <div>
            <a class="text-decoration-none text-body" href="{{ route('ads.show', $ad->id) }}">{{ $ad->name }}</a>
        </div>
        <div>
            {{ $ad->city->name }} {{ $ad->created_at->locale(config('app.locale'))->calendar() }}
        </div>
    </div>
    <div class="col-md-3">
        <div>
            {{ $ad->price }} {{ $ad->currency }}
        </div>
    </div>
</div>
