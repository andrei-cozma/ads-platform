@extends('layouts.main')

@section('content')
    <x-search-form/>
    <div class="row">
        <div class="col"><h3>{{ __('text.Promoted ads') }}</h3></div>
    </div>
    <div class="row">
        @foreach($ads as $ad)
            <div class="col-6 col-md-2">
                <div class="image">
                    <a href="{{ route('ads.show', $ad->id) }}"><img class="img-fluid" src="{{ asset('storage/' . $ad->mainImage->name) }}" alt="{{ $ad->name }}"></a>
                </div>
                <a class="text-decoration-none text-body" href="{{ route('ads.show', $ad->id) }}">{{ $ad->name }}</a>
            </div>
        @endforeach
        <div class="col-6 col-md-2 d-flex align-items-center">
            <a href="{{ route('ads.index') }}">{{ __('text.View all') }}</a>
        </div>
    </div>
@endsection
