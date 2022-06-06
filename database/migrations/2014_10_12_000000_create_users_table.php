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
            $table->uuid('uid')->unique();
            $table->foreignId('role_id')->references('id')->on('roles')->onDelete('CASCADE');
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('CASCADE');
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('gender', ['Masculin', 'Féminin'])->nullable();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('organization')->nullable();
            $table->boolean('is_authorized')->default(false);
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
