# Ads platform
Website for presenting advertisements.

## Installing
```bash
git clone https://github.com/andrei-cozma/ads-platform.git ads-platform
cd ads-platform
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
touch database/database.sql
php artisan migrate ## --seed if you want demo data
php artisan serve
```

## Using Elasticsearch
In ```.env``` set this keys
```bash
ELASTICSEARCH_ENABLED = true
ELASTICSEARCH_HOSTS = "localhost:9200"
```
Run ```php artisan elasticsearch:reindex```  
Now primary source when you search for ads is Elasticsearch Server, giving you the extra capabilities.
See ```App\Repositories\AdsElasticSearchRepository.php```

## What I've been playing with so far

- commands
- requests
- observers
- providers
- repositories and interfaces
- traits
- blade components
- factories and seeders
- translations

[Elasticsearch](https://www.elastic.co/)
