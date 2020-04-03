<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
