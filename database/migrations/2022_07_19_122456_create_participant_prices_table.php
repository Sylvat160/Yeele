<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->references('id')->on('participants')->cascadeOnDelete();
            $table->foreignUuid('event_price_uid')->references('uid')->on('event_prices')->cascadeOnDelete();
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('participant_prices');
    }
}
