<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserToCityForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
           /* $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('country_id')
                ->references('country_id')
                ->on('cities')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
         /*   $table->dropForeign('users_city_id_foreign');
            $table->dropForeign('users_country_id_foreign');*/
        });
    }
}
