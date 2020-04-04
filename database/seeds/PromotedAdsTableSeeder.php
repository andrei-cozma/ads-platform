<?php

use App\Ad;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotedAdsTableSeeder extends Seeder
{
    public function run()
    {
        // no of promoted ads you wish to generate
        $numberOfPromotedAds = 70;
        $promotedAds = [];
        $adIds = Ad::all()->random($numberOfPromotedAds)->modelKeys();
        foreach ($adIds as $adId) {
            $promoStart = Carbon::now()->subDays(rand(0, 30));
            $promoEnd = $promoStart->copy()->addDays(rand(0, 60));
            $promotedAds[] =  [
                'ad_id' => $adId,
                'promo_start' => $promoStart,
                'promo_end' => $promoEnd
            ];
        }
        DB::table('promoted_ads')->insert($promotedAds);
    }
}
