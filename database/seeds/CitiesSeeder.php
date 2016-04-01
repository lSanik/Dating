<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        $script = getcwd().'/database/seeds/sql/cities.sql';
        //echo $script;
        $host     = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');

        $command = "mysql -u $username -h $host -p$password $database < $script";

        exec($command);
    }
}
