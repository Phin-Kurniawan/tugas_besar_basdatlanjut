<?php

use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy pet 1
        DB::table('pets')->insert([
            'user_id' => '02174867',
            'name' => 'Artyom',
            'age' => 5,
            'type' => 'Cat',
            'weight' => 3.14,
            'id'=>134567
        ]);

        // Dummy pet 2
        DB::table('pets')->insert([
            'user_id' => '02174867',
            'name' => 'Blacky',
            'age' => 3,
            'type' => 'Dog',
            'weight' => 3.14,
            'id'=>134568
        ]);
    }
}
