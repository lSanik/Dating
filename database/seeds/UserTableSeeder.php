<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'id'            => 1,
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('admin'),
            'role_id'       => 1,
            'first_name'    => 'Admin',
            'second_name'   => 'ADM'
        ]);

        DB::table('users')->insert([
            'id'            => 2,
            'email'         => 'moder@moder.com',
            'password'      => bcrypt('moder'),
            'role_id'       => 2,
            'first_name'    => 'Moder',
            'second_name'   => 'MDM'
        ]);

        DB::table('users')->insert([
            'id'            => 3,
            'email'         => 'partner@partner.com',
            'password'      => bcrypt('partner'),
            'role_id'       => 3,
            'first_name'    => 'Partner',
            'second_name'   => 'PDM'
        ]);

        DB::table('users')->insert([
            'id'            => 4,
            'email'         => 'male@male.com',
            'password'      => bcrypt('male'),
            'role_id'       => 4,
            'first_name'    => 'Male',
            'second_name'   => 'MFM'
        ]);

        DB::table('users')->insert([
            'id'            => 5,
            'email'         => 'female@female.com',
            'password'      => bcrypt('female'),
            'role_id'       => 5,
            'first_name'    => 'Male',
            'second_name'   => 'MFM'
        ]);
    }
}
