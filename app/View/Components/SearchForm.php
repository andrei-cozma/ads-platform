<?php

namespace App\View\Components;

use App\City;
use Illuminate\View\Component;

class SearchForm extends Component
{
    private $searchedQuery;
    private $searchedCityId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $searchedQuery = '', int $searchedCityId = 0)
    {
        $this->searchedQuery = $searchedQuery;
        $this->searchedCityId = $searchedCityId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.search-form', [
            'cities' => City::all(),
            'searchedQuery' => $this->searchedQuery,
            'searchedCityId' => $this->searchedCityId
        ]);
    }
}
