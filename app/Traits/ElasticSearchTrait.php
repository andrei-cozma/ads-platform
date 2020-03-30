<?php

namespace App\Traits;

use App\Observers\ElasticSearchObserver;

trait ElasticSearchTrait
{
    public static function bootElasticSearchTrait()
    {
        if (config('services.elastic-search.enabled')) {
            static::observe(ElasticSearchObserver::class);
        }
    }

    public function getSearchIndex()
    {
        return $this->getTable();
    }

    public function toSearchArray()
    {
        return $this->toArray();
    }
}
