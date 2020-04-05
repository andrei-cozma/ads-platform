@extends('layouts.main')

@section('content')
    <x-search-form/>
    <div class="row">
        <div class="col">
            <h1>{{ $ad->name }}</h1>
        </div>
    </div>
@endsection
