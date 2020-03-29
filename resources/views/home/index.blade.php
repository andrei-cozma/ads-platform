@extends('layouts.main')

@section('content')
    <h3>{{ __('text.Promoted ads') }}</h3>
    <div class="row">
        @foreach($ads as $ad)
            <div class="col-6 col-md-2">
                <div class="image">
                    <img class="img-fluid" src="{{ asset('storage/' . $ad->mainImage->name) }}" alt="{{ $ad->name }}">
                </div>
                {{ $ad->name }}
            </div>
        @endforeach
        <div class="col-6 col-md-2 d-flex align-items-center">
            <a href="{{ route('ads.index') }}">{{ __('text.View all') }}</a>
        </div>
    </div>
@endsection
