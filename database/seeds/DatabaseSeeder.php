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
        $this->call(UserTableSeeder::class);
        $this->call(Role::class);
      //  $this->call(CountrySeeder::class);
       // $this->call(States::class);
        //@todo seeder
    }
}
