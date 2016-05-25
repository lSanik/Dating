<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pages_id')->unsigned();
            $table->foreign('pages_id')->references('id')->on('pages')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('media');
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
        Schema::drop('pages_media');
    }
}
