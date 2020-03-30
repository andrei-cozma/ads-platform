<?php

namespace App\Repositories;

use App\Ad;
use Illuminate\Database\Eloquent\Collection;

class AdsEloquentRepository implements AdsRepositoryInterface
{
    public function search(string $query = ''): Collection
    {
        return Ad::where('name', 'like', "%{$query}%")->get();
    }
}
