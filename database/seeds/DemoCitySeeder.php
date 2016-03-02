<?php

use Illuminate\Database\Seeder;

class DemoCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        $cities = [
            [1, 'DemoCity', 1],
            [2, 'DemoCity', 1],
        ];

        DB::table('cities')->insert( $cities );
    }
}
