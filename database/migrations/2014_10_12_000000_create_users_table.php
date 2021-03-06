<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password', 60);
            $table->string('activation_code');
            $table->tinyInteger('resent')->unsigned();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname');
            $table->string('avatar');

            $table->string('company_name');
            $table->text('address');
            $table->text('info');
            $table->text('contacts');

            $table->integer('status_id')->unsigned();

            $table->integer('partner_id');

            $table->boolean('active')->default(0);
            $table->integer('role_id')->unsigned();

            $table->integer('city_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('country_id')->unsigned();

            $table->timestamp('last_login');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
