<?php
use Illuminate\Database\Seeder;
class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Data dummy-1
        DB::table('appointments')->insert([
            'owner_id'=>'02174867',
            'pet_id'=>'134568',
            'vet_id'=>'124',
            'doctor_id'=>'25057116',
            'date'=>'30 Juni 2022'
        ]);

        DB::table('appointments')->insert([
            'owner_id'=>'02174867',
            'pet_id'=>'134567',
            'vet_id'=>'123',
            'doctor_id'=>'25057116',
            'date'=>'30 Juni 2022'
        ]);
    }
}