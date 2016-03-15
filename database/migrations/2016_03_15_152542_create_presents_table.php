<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->text('image');
            $table->integer('price');
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
        Schema::drop('presents');
    }
}
