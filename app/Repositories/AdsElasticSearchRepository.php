<?php

namespace App\Repositories;

use App\Ad;
use Elasticsearch\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class AdsElasticSearchRepository implements AdsRepositoryInterface
{
    private $elasticSearch;

    public function __construct(Client $elasticSearch)
    {
        $this->elasticSearch = $elasticSearch;
    }

    public function search(string $query = '', int $cityId = 0): Collection
    {
        $ad = new Ad;
        if ($cityId) {
            $items = $this->elasticSearch->search([
                'index' => $ad->getSearchIndex(),
                'body' => [
                    'query' => [
                        'bool' => [
                            'must' => [
                                ['match_phrase' => ['name' => $query]],
                                ['term' => ['city_id' => $cityId]]
                            ]
                        ]
                    ]
                ]
            ]);
        } else {
            $items = $this->elasticSearch->search([
                'index' => $ad->getSearchIndex(),
                'body' => [
                    'query' => [
                        'match_phrase' => [
                            'name' => $query
                        ]
                    ]
                ]
            ]);
        }

        $ids = Arr::pluck($items['hits']['hits'], '_id');

        return Ad::findMany($ids)
            ->sortBy(function ($ad) use ($ids) {
                return array_search($ad->getKey(), $ids);
            });
    }
}
