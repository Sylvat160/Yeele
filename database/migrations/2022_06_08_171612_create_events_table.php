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
            $table->date('start_date_time');
            $table->dateTime('end_date_time');
            $table->dateTime('signup_end_date_time');
            $table->string('image');
            $table->string('location');
            $table->longText('map_html');
            $table->string('country');
            $table->string('city');
            $table->boolean('counter_active')->default(true);
            $table->string('bg_color')->nullable();
            $table->string('text_color')->nullable();
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
