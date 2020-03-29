<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Bucuresti'],
            ['name' => 'Constanta'],
            ['name' => 'Brasov'],
            ['name' => 'Iasi'],
            ['name' => 'Cluj-Napoca'],
            ['name' => 'Timisoara'],
            ['name' => 'Craiova']
        ]);
    }
}
