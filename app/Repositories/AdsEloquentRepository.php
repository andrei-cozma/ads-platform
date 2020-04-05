<?php

namespace App\Repositories;

use App\Ad;
use Illuminate\Database\Eloquent\Collection;

class AdsEloquentRepository implements AdsRepositoryInterface
{
    public function search(string $query = '', int $cityId = 0): Collection
    {
        $sql = Ad::where('name', 'like', "%{$query}%");
        if ($cityId) {
            $sql->where('city_id', $cityId);
        }
        $ads = $sql->with(['mainImage', 'city']) ->get();

        return $ads;
    }
}
