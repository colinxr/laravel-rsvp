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
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('postal');
            $table->string('instagram')->nullable();
            $table->string('gender')->nullable();
            $table->string('company')->nullable();
            $table->string('role')->nullable();
            $table->string('category')->nullable();
            $table->string('guest_of')->nullable();
            $table->string('hasPlusOne')->nullable();
            $table->string('guest-firstName')->nullable();
            $table->string('guest-lastName')->nullable();
            $table->string('guest-email')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('guests');
    }
}
