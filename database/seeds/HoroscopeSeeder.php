<?php

use Illuminate\Database\Seeder;

class HoroscopeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hdate')->delete();

        $horoscope_dates = [
            ['name' => 'Aries',         'start_date' => '21.03', 'stop_date' => '20.04'],
            ['name' => 'Taurus',        'start_date' => '21.04', 'stop_date' => '21.05'],
            ['name' => 'Gemini',        'start_date' => '22.05', 'stop_date' => '21.06'],
            ['name' => 'Cancer',        'start_date' => '22.06', 'stop_date' => '22.07'],
            ['name' => 'Leo',           'start_date' => '23.07', 'stop_date' => '23.08'],
            ['name' => 'Virgo',         'start_date' => '24.08', 'stop_date' => '23.09'],
            ['name' => 'Libra',         'start_date' => '24.09', 'stop_date' => '23.10'],
            ['name' => 'Scorpio',       'start_date' => '24.10', 'stop_date' => '23.11'],
            ['name' => 'Sagittarius',   'start_date' => '24.11', 'stop_date' => '21.12'],
            ['name' => 'Capricornus',   'start_date' => '22.12', 'stop_date' => '20.01'],
            ['name' => 'Aquarius',      'start_date' => '21.01', 'stop_date' => '18.02'],
            ['name' => 'Pisces',        'start_date' => '19.02', 'stop_date' => '20.03'],
        ];

        DB::table('hdate')->insert($horoscope_dates);
    }
}
