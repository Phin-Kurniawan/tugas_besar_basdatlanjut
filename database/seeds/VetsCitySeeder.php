<?php

use Illuminate\Database\Seeder;

class VetsCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vet_cities')->insert([
            'id' => 1,
            'city' => 'Bandung'
        ]);

        DB::table('vet_cities')->insert([
            'id' => 2,
            'city' => 'Jakarta'
        ]);
    }
}
