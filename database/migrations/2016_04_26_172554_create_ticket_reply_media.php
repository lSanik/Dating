<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketReplyMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_reply_media', function(Blueprint $table){
            $table->increments('id');
            $table->integer('reply_id')->unsigned();
            $table->foreign('reply_id')->references('id')->on('ticket_reply')->onDelete("CASCADE");
            $table->string('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
