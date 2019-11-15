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
            $table->bigIncrements('id');
            $table->bigInteger('owner_id')->unsigned()->nullable();
            $table->string('rsvp_type');
            $table->string('status');
            $table->string('event_theme')->default('THEME_ONE');
            $table->string('name');
            $table->string('address');
            $table->string('description');
            $table->string('date');
            $table->string('time');
            $table->string('host');
            $table->string('property');
            $table->string('has_sponsors');
            $table->string('subject_line')->default('Your Sharp: The Book for Men Launch Event Confirmation');
            $table->string('deny_subject_line')->default('Your Sharp: The Book for Men RSVP');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
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
