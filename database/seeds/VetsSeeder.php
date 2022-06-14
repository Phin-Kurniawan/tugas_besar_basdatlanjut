<?php

use Illuminate\Database\Seeder;

class VetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vets')->insert([
            'id'=>'123',
            'name' => 'Dummy Vet 1',
            'address' => 'Dummy address 1',
            'phone' => '01234567891',
            'city_id' => 1
        ]);

        DB::table('vets')->insert([
            'id'=>'124',
            'name' => 'Dummy Vet 2',
            'address' => 'Dummy address 2',
            'phone' => '01234567892',
            'city_id' => 2
        ]);
    }
}
