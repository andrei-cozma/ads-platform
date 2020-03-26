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
        // we need separate queries for each image for setting as main image the first occurrence
        for ($i = 0; $i < 300; $i++) {
            factory(App\Image::class)->create();
        }
    }
}
