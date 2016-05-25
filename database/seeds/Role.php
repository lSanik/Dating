<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert([
            'id'            => 1,
            'name'          => 'Owner',
            'description'   => 'Owner has grand access.',
        ]);

        DB::table('roles')->insert([
            'id'            => 2,
            'name'          => 'Moder',
            'description'   => 'Moder have part access.',
        ]);

        DB::table('roles')->insert([
            'id'            => 3,
            'name'          => 'Partner',
            'description'   => 'Partner access',
        ]);

        DB::table('roles')->insert([
            'id'            => 4,
            'name'          => 'Male',
            'description'   => 'Man access',
        ]);

        DB::table('roles')->insert([
            'id'            => 5,
            'name'          => 'Female',
            'description'   => 'Woman access',
        ]);

        DB::table('roles')->insert([
            'id'          => 6,
            'name'        => 'Alien',
            'description' => 'Alien access',
        ]);
    }
}
