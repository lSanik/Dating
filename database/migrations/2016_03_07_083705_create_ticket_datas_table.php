<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_datas', function (Blueprint $table) {

            $table->integer('t_id')->unsigned();
            $table->integer('u_id')->unsigned();

            $table->string('subject');
            $table->text('message');
            $table->timestamps();

        });

        Schema::table('ticket_datas', function (Blueprint $table) {

            $table->foreign('t_id')->references('id')->on('tickets')->onDelete('CASCADE');
            $table->foreign('u_id')->references('id')->on('users')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_datas');
    }
}
