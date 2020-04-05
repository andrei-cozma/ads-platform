@extends('layouts.main')

@section('content')
    <x-search-form/>

    <div class="row">
        <div class="col">{{ $ad->category->name }}</div>
    </div>
    <div class="row">
        <div class="col-10">
            <img class="img-fluid" src="{{ asset('storage/' . $ad->mainImage->name) }}" alt="{{ $ad->name }}">
            <h1>{{ $ad->name }}</h1>
            <div class="row">
                <div class="col">{{ $ad->city->name }}</div>
                <div class="col">{{ __('text.Added') }} {{ $ad->created_at->locale(config('app.locale'))->calendar() }}</div>
            </div>
            <div>{{ $ad->description }}</div>
            @foreach($ad->images as $adImage)
                @if($adImage->main) @continue @endif
                <div class="row mb-2">
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('storage/' . $adImage->name) }}" alt="{{ $ad->name }}">
                    </div>
                </div>
            @endforeach
            <div><a href="{{ route('ads.index') }}">{{ __('text.Back') }}</a></div>
        </div>

        <div class="col-2 bg-white">
            <p class="font-weight-bold mt-2">{{ $ad->price }} {{ $ad->currency }}</p>
            <p>{{ $ad->user->name }}</p>
            <p>{{ $ad->user->phone }}</p>
            <p>{{ $ad->user->email }}</p>
        </div>
    </div>
@endsection
