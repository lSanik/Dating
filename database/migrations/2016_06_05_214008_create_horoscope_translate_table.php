<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoroscopeTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htranslate', function(Blueprint $table){
            $table->increments('id');
            $table->integer('compare')->unsigned();
            $table->foreign('compare')->references('id')->on('hcompare')->onDelete('CASCADE');
            $table->text('text');
            $table->string('locale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('htranslate');
    }
}
