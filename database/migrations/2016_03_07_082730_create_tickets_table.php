<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('subject',
                [
                    'complaint',
                    'girl_activation',
                    'trouble_vs_delivery',
                    'photo_vs_video',
                    'payment',
                    'chats',
                    'site_trouble',
                    'penalty',
                    'blocked_mess',
                    'gift',
                    'call',
                    'other'
                ]);

            $table->enum('status', ['wait', 'open', 'close']);
            $table->enum('viewed', ['0','1']);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
