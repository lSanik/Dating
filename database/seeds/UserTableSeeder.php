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
            'last_name'     => 'ADM',
            'phone'         => '123'
        ]);

        DB::table('users')->insert([
            'id'            => 2,
            'email'         => 'moder@moder.com',
            'password'      => bcrypt('moder'),
            'role_id'       => 2,
            'first_name'    => 'Moder',
            'last_name'   => 'MDM',
            'phone'         => '1234'
        ]);

        DB::table('users')->insert([
            'id'            => 3,
            'email'         => 'partner@partner.com',
            'password'      => bcrypt('partner'),
            'role_id'       => 3,
            'first_name'    => 'Partner',
            'last_name'   => 'PDM',
            'phone'         => '12345'
        ]);

        DB::table('users')->insert([
            'id'            => 4,
            'email'         => 'male@male.com',
            'password'      => bcrypt('male'),
            'role_id'       => 4,
            'first_name'    => 'Male',
            'last_name'   => 'MFM',
            'phone'         => '123456'
        ]);

        DB::table('users')->insert([
            'id'            => 5,
            'email'         => 'female@female.com',
            'password'      => bcrypt('female'),
            'role_id'       => 5,
            'first_name'    => 'Male',
            'last_name'   => 'MFM',
            'phone'         => '1234567'
        ]);

        DB::table('users')->insert([
            'id'            => 6,
            'email'         => 'partner1@partner.com',
            'password'      => bcrypt('partner'),
            'role_id'       => 3,
            'first_name'    => 'Partner',
            'last_name'   => 'PDM',
            'phone'         => '12235345'
        ]);

        DB::table('users')->insert([
            'id'            => 7,
            'email'         => 'partner2@partner.com',
            'password'      => bcrypt('partner'),
            'role_id'       => 3,
            'first_name'    => 'Partner',
            'last_name'   => 'PDM',
            'phone'         => '12261345'
        ]);
    }
}
