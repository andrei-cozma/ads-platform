@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('ads.search') }}" method="get">
                <input type="text" name="query" placeholder="{{ __('text.Search here') }}">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>{{ $ad->name }}</h1>
        </div>
    </div>
@endsection
