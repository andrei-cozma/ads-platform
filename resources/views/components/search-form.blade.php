<div class="row my-5">
    <div class="col">
        <nav class="navbar navbar-light bg-info">
            <form action="{{ route('ads.search') }}" method="get" class="w-100">
                <div class="row">
                    <div class="col col-md-6">
                        <input type="text" name="query" value="{{ $searchedQuery }}" placeholder="{{ __('text.Search here') }}" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <select name="city_id" id="city" class="form-control mr-3">
                            <option value="0">{{ __('text.All cities') }}</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" @if($searchedCityId == $city->id) selected @endif>{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <button type="submit" class="btn btn-success btn-block">{{ __('text.Search') }}</button>
                    </div>
                </div>
            </form>
        </nav>
    </div>
</div>
