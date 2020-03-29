<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function mainImage()
    {
        return $this->hasOne(Image::class)->where('main', 1)->withDefault([
            'name' => 'placeholder.png'
        ]);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
