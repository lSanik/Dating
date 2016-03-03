<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();

        DB::table('status')->insert([
            'id'            => 1,
            'name'          => 'active',
            'description'   => 'Active'
        ]);

        DB::table('status')->insert([
            'id'            => 2,
            'name'          => 'deactive',
            'description'   => 'Deactive'
        ]);

        DB::table('status')->insert([
            'id'            => 3,
            'name'          => 'dismiss',
            'description'   => 'Dismiss'
        ]);

        DB::table('status')->insert([
            'id'            => 4,
            'name'          => 'deleted',
            'description'   => 'Deleted'
        ]);

        DB::table('status')->insert([
            'id'            => 5,
            'name'          => 'onmoderation',
            'description'   => 'On moderation'
        ]);


    }
}
