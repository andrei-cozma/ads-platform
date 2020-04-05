@extends('layouts.main')

@section('content')
    <x-search-form :searched-query="request('query')" :searched-city-id="request('city_id')"/>
    <div class="row">
        <div class="col"><h2>{{ __('text.Ads for') }} {{ request('query') }}</h2></div>
    </div>
    @foreach($ads as $ad)
        @include('partials.ad', ['ad' => $ad])
    @endforeach
@endsection
