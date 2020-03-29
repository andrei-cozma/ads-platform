<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // individual queries
        // setting as main image first image for an ad
        for ($i = 0; $i < 300; $i++) {
            factory(App\Image::class)->create();
        }
    }
}
