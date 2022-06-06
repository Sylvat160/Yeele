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
            $table->foreignId('plan_id')->nullable()->references('id')->on('plans')->nullOnDelete();
            $table->integer('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('payment_method');

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