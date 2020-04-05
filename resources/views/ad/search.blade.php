@extends('layouts.main')

@section('content')
    <x-search-form :searched-query="request('query')" :searched-city-id="request('city_id')"/>
    <div class="row">
        <div class="col"><h2>{{ __('text.Ads for') }} {{ request('query') }}</h2></div>
    </div>
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
