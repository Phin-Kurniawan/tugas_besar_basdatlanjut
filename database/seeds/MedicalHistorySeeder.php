<?php

use Illuminate\Database\Seeder;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Dummy-1
        DB::table('medical_histories')->insert([
            'diagnostic_result'=> 'Lorem ipsum dolor sit amet, finibus nec. Vestibulum vestibulum ipsum vel porttitor sollicitudin.',
            'pet_id'=> '134568'
        ]);


    }
}
