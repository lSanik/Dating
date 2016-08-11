<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateExpanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function(Blueprint $table){
            $table->string('type');
            $table->integer('partner_id')->unsigned()->nullable();
            $table->date('expire')->nullable();

            $table->foreign('partner_id')->references('id')->on('users')->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expenses', function(Blueprint $table){
            $table->dropForeign('partner_id');
            $table->dropColumn('partner_id');
            $table->dropColumn('expire');
            $table->dropColumn('type');
        });
    }
}
