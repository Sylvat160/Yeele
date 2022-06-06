<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_uid')->references('uid')->on('users')->onDelete('CASCADE');
            $table->unsignedInteger('plan_id')->nullable();
            $table->integer('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('payment_method');

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('set null');
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
        Schema::dropIfExists('choices');
    }
}
