<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->foreignUuid('user_uid')->references('uid')->on('users')->onDelete('CASCADE');
            $table->foreignId('plan_id')->nullable()->references('id')->on('plans')->nullOnDelete();
            $table->integer('duration')->nullable();
            $table->datetime('start_date_time')->nullable();
            $table->datetime('end_date_time')->nullable();
            $table->foreignId('payment_method_id')->nullable()->references('id')->on('payment_methods')->nullOnDelete();

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
        Schema::dropIfExists('commands');
    }
}
