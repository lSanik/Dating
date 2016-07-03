<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Role::class);
        $this->call(UserTableSeeder::class);
        $this->call(StatusTableSeeder::class);

        $this->call(CountrySeederNew::class);
        $this->call(States::class);
        $this->call(CitiesSeeder::class);

        $this->call(TicketSubjects::class);
        $this->call(ServicePriceSeeder::class);

        //@todo seeder for cities2.sql

        $this->call(HoroscopeSeeder::class);
    }
}
