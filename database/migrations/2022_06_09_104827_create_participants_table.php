<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('event_uid')->on('events')->cascadeOnDelete();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->bigInteger('phone');
            $table->string('civility');
            $table->integer('price')->nullable();
            $table->string('payment_method')->nullable();
            $table->foreignUuid('field_uid')->nullable()->on('fields')->nullOnDelete();
            $table->longText('additional_data')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->boolean('attendance')->default(false);
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
        Schema::dropIfExists('participants');
    }
}
