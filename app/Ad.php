<?php

namespace App;

use App\Traits\ElasticSearchTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use ElasticSearchTrait;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function mainImage()
    {
        return $this->hasOne(Image::class)->where('main', 1)->withDefault([
            'name' => 'ads/placeholder.png'
        ]);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function scopePromotedActive($query)
    {
        return $query->leftJoin('promoted_ads', 'ads.id', '=', 'promoted_ads.ad_id')
            ->where('promoted_ads.promo_start', '<=', Carbon::now())
            ->where('promoted_ads.promo_end', '>=', Carbon::now())
            ->select(['ads.id', 'ads.name']);
    }
}
