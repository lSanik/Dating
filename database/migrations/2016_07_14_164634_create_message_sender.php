<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageSender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_sender', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('girl_id')->unsigned();
            $table->foreign('girl_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->integer('status')->unsigned();
            $table->string('title');
            $table->string('body');
            $table->string('filter_data');
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
        Schema::drop('message_sender');
    }
}
