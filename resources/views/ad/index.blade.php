@extends('layouts.main')

@section('content')
    <x-search-form/>
    <div class="row">
        <div class="col"><h2>{{ __('text.All ads') }}</h2></div>
    </div>
    @foreach($ads as $ad)
        @include('partials.ad', ['ad' => $ad])
    @endforeach
    <div class="row">
        <div class="col text-center">{{ $ads->links() }}</div>
    </div>
@endsection
