<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CrateTicketMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->unsigned();
            $table->tinyInteger('status');
            $table->integer('subjects')->unsigned();
            $table->string('subject');
            $table->text('message');

            $table->timestamps();

            $table->foreign('from')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('subjects')->references('id')->on('ticket_subjects');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_messages');
    }
}
