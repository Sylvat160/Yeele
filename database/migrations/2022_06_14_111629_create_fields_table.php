<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->uuid('uid');
            $table->foreignUuid('event_uid')->on('events')->cascadeOnDelete();
            $table->string('name');
            $table->string('value1');
            $table->string('value2')->nullable();
            $table->string('value3')->nullable();
            $table->string('value4')->nullable();
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
        Schema::dropIfExists('fields');
    }
}
