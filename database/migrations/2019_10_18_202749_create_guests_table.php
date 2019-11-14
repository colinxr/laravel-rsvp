<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('postal');
            $table->string('instagram')->nullable();
            $table->string('gender')->nullable();
            $table->string('company')->nullable();
            $table->string('role')->nullable();
            $table->string('category')->nullable();
            $table->string('guest_of')->nullable();
            $table->string('hasPlusOne')->nullable();
            $table->string('guest_firstName')->nullable();
            $table->string('guest_lastName')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
