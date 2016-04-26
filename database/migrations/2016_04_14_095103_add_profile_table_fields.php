<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileTableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile', function(Blueprint $table){
            $table->increments('id');
            $table->text('about');
            $table->text('looking');
            $table->integer('l_age_start');
            $table->integer('l_age_stop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile', function(Blueprint $table){
            $table->dropColumn('id');
            $table->dropColumn('about');
            $table->dropColumn('looking');
            $table->dropColumn('l_age_start');
            $table->dropColumn('l_age_stop');
        });
    }
}
