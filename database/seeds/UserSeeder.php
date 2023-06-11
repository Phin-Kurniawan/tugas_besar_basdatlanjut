<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Dummy user 1 (doctor)
        DB::table('users')->insert([
            'id' => '25057116',
            'name' => 'Ir. Dr. Prof. Phin Kurniawan',
            'email' => 'doctor@dummy.com',
            'address' => 'Jl Cinere Raya 36, Dki Jakarta',
            'phone' => '0217530270',
            'password' => Hash::make('password'),
            'role' => 'doctor'
        ]);

        // Dummy user 2 (admin)
        DB::table('users')->insert([
            'id' => '230933919',
            'name' => 'Ika Permata',
            'email' => 'admin@dummy.com',
            'address' => 'Jl Wastukencana 5, Jawa Barat',
            'phone' => '0224230061',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Dummy user 3 (owner)
        DB::table('users')->insert([
            'id' => '02174867',
            'name' => 'Prabowo Pradana',
            'email' => 'owner@dummy.com',
            'address' => 'Jl Cihapit 34 Lt 2, Jawa Barat',
            'phone' => '022431628',
            'password' => Hash::make('password'),
            'role' => 'owner'
        ]);

    }
}
