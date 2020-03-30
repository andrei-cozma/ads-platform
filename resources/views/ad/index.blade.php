@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('ads.search') }}" method="get">
                <input type="text" name="query" placeholder="{{ __('text.Search here') }}">
            </form>
        </div>
    </div>
    <h2>{{ __('text.Promoted') }}</h2>
    @foreach($ads as $ad)
        <div class="row">
            <div class="col-md-3">
                <div class="image">
                    <img class="img-fluid" src="{{ asset('storage/' . $ad->mainImage->name) }}" alt="{{ $ad->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    {{ $ad->name }}
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
    @endforeach
@endsection