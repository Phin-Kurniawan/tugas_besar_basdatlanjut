<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => '2022 RSPCA Event',
            'news'=> 'PETS International keeps track of all events in the global pet industry and showcases the most relevant pet events up to date.',
            'date'=> '20-24 July 2022',
            'picture'=> 'https://weezevent.com/wp-content/uploads/2019/08/27143613/woof-run-evenement-canin-1000x640.jpg',
            'link'=> 'example.com'

        ]);

        DB::table('events')->insert([
            'title' => 'GlobalPETS Forum 2022',
            'news'=> "It's the leading networking event for decision makers in the pet industry from across the world, limited to 250 executives for optimal networking.",
            'date'=> '22 - 25 April 2022',
            'picture'=> 'https://globalpetindustry.com/sites/default/files/inline-images/GPF.png',
            'link'=> 'https://globalpetindustry.com/gpf-2022'
        ]);
    }
}
