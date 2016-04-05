<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketReplyMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->unsigned();
            $table->text('reply');
            $table->integer('r_uid')->unsigned();
            $table->timestamps();
        });

        Schema::table('ticket_reply', function(Blueprint $table){
            $table->foreign('message_id')->references('id')->on('ticket_messages')->onDelete("CASCADE");
            $table->foreign('r_uid')->references('id')->on('users')->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_reply');
    }
}
