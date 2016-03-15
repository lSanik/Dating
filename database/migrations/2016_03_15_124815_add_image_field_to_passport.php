<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageFieldToPassport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passport', function (Blueprint $table) {
            $table->text('cover')->after('date');
            $table->string('video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('passport', function (Blueprint $table) {
            $table->dropColumn('cover');
            $table->dropColumn('video');
        });
    }
}
