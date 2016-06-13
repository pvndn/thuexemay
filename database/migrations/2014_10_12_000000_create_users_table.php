<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('users', function (Blueprint $blueprint) {
                $blueprint->increments('id');
                $blueprint->string('name');
                $blueprint->string('email')->unique();
                $blueprint->string('password');
                $blueprint->string('image');
                $blueprint->rememberToken();
                $blueprint->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
