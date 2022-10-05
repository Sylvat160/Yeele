<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('uid');
            $table->foreignUuid('user_uid')->references('uid')->on('users')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->nullOnDelete();
            $table->foreignId('type_id')->default(1)->nullable()->references('id')->on('types')->nullOnDelete();
            $table->string('name');
            $table->longText('description');
            $table->boolean('chosen_form')->default(false);
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->dateTime('signup_end_date_time');
            $table->string('image');
            $table->string('location');
            $table->longText('map_html');
            $table->string('country');
            $table->string('city');
            $table->boolean('counter_active')->default(true);
            $table->string('bg_color')->default('#000000')->nullable();
            $table->string('text_color')->default('#000000')->nullable();
            $table->boolean('multiple_prices_active')->default(false);
            $table->boolean('prices_quantity_active')->default(false);
            $table->longText('form_fields_names')->nullable();
            $table->integer('clicks')->default(0);
            $table->string('receiver_firstname')->nullable();
            $table->string('receiver_lastname')->nullable();
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
        Schema::dropIfExists('events');
    }
}
