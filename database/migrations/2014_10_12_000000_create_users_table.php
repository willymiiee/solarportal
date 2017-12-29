<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type', ['C', 'V', 'A'])->default('C');
            $table->string('confirmation_code')->nullable();
            $table->dateTime('confirmed_at')->nullable();
            $table->enum('gender', ['m', 'f'])->default('m');
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('main_domicile')->nullable();
            $table->text('address')->nullable();
            $table->string('lost_password')->nullable();
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
