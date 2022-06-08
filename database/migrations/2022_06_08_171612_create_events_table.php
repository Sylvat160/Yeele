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
            $table->string('name');
            $table->longText('description');
            $table->boolean('chosen_form')->default(false);
            $table->date('start_date');
            $table->date('end_date');
            $table->date('signup_end_date');
            $table->string('image');
            $table->string('location');
            $table->string('map_html');
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->nullOnDelete();
            $table->string('city');
            $table->string('bg_color');
            $table->string('text_color');
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
