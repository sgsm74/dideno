<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('fatherName')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('SN');
            $table->string('phoneNumber');
            $table->string('major');
            $table->string('university');
            $table->string('city')->nullable();
            $table->string('avatar')->default('user-default-thumbnail.gif');
            $table->enum('grade',['none','diploma','associate','bachelor','master','doctoral']);
            $table->enum('role',['admin','user'])->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
