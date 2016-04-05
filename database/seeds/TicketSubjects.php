<?php

use Illuminate\Database\Seeder;

class TicketSubjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_subjects')->delete();

        $statuses = [
            ['name' => 'complaint'],
            ['name' => 'girl_activation'],
            ['name' => 'trouble_vs_delivery'],
            ['name' => 'photo_vs_video'],
            ['name' => 'payment'],
            ['name' => 'chats'],
            ['name' => 'site_trouble'],
            ['name' => 'penalty'],
            ['name' => 'blocked_mess'],
            ['name' => 'gift'],
            ['name' => 'call'],
            ['name' => 'other'],
        ];

        DB::table('ticket_subjects')->insert($statuses);
    }
}
