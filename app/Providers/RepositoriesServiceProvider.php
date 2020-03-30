<?php

namespace App\Providers;

use App\Repositories\AdsElasticSearchRepository;
use App\Repositories\AdsEloquentRepository;
use App\Repositories\AdsRepositoryInterface;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            AdsRepositoryInterface::class, function ($app) {
                if (! config('services.elastic-search.enabled')) {
                    return new AdsEloquentRepository();
                }

                return new AdsElasticSearchRepository(
                    $app->make(Client::class)
                );
            }
        );

        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts(config('services.elastic-search.hosts'))
                ->build();
        });
    }
}
