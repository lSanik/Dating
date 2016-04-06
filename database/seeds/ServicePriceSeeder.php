<?php

use Illuminate\Database\Seeder;

class ServicePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services_price')->delete();

        $services = [
            ['name' => 'ex_rate',       'price' => '2.5', 'term' => null],
            ['name' => 'message',       'price' => '1', 'term' => 'once'],
            ['name' => 'chat',          'price' => '0.2', 'term' => 'minute'],
            ['name' => 'video',         'price' => '0.5', 'term' => 'minute'],
            ['name' => 'photo_album',   'price' => '0.5', 'term' => 'week'],
            ['name' => 'girl_video',    'price' => '0.5', 'term' => 'week'],
            ['name' => 'call',          'price' => '0.4', 'term' => 'minute'],
            ['name' => 'flp',           'price' => '20', 'term' => 'once'],
            ['name' => 'fle',           'price' => '10', 'term' => 'once'],
            ['name' => 'horoscope',     'price' => '1', 'term' => 'once'],
            ['name' => 'month',         'price' => '100', 'term' => 'month'],
            ['name' => 'girl_blog',     'price' => '0.2', 'term' => 'once']
        ];

        DB::table('services_price')->insert($services);
    }
}
