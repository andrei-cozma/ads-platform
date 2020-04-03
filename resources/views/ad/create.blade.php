@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col"><h1>{{ __('text.Add a new ad') }}</h1></div>
    </div>

    @if ($errors->any())
        <div class="row">
            <div class="col">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('text.Title') }}</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="category">{{ __('text.Category') }}</label>
                            <select name="category_id" id="category" class="form-control">
                                <option disabled selected>{{ __('text.Select category') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="price">{{ __('text.Price') }}</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="price">{{ __('text.Currency') }}</label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="Eur">Eur</option>
                                <option value="Lei">Lei</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">{{ __('text.Description') }}</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>{{ __('text.Image') }}</label>
                    <div class="row">
                        <div class="col-3"><input type="file" name="images[0]" class="form-control"></div>
                        <div class="col-3"><input type="file" name="images[1]" class="form-control"></div>
                        <div class="col-3"><input type="file" name="images[2]" class="form-control"></div>
                        <div class="col-3"><input type="file" name="images[3]" class="form-control"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="city">{{ __('text.City') }}</label>
                    <select name="city_id" id="city" class="form-control">
                        <option disabled selected>{{ __('text.Select city') }}</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="contact">{{ __('text.Contact') }}</label>
                            <input type="text" name="contact" id="contact" class="form-control" value="{{ auth()->user()->name }}" disabled>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="email">{{ __('text.Email') }}</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="form-group">
                            <label for="phone">{{ __('text.Phone') }}</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ auth()->user()->phone }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-4">
                        <button class="btn btn-primary btn-block" type="submit">{{ __('text.Add') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
