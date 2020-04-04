<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePromotedAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoted_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id');
            $table->timestamp('promo_start')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('promo_end')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->foreign('ad_id')->references('id')->on('ads')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promoted_ads', function (Blueprint $table) {
            $table->dropForeign(['ad_id']);
        });
        Schema::dropIfExists('promoted_ads');
    }
}
