<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface AdsRepositoryInterface
{
    public function search(string $query = ''): Collection;
}
