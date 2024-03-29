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
            $table->id();
            //$table->unsignedBigInteger('role_id')->default(2);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable($value = true)->unique();
            $table->integer('phone')->nullable($value = true)->unique();
            $table->string('role')->default('user');
            $table->string('password');
           // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
