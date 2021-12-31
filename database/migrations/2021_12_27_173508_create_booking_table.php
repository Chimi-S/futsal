<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->unsignedBigInteger('user_id')->index();
            $table->date('date');
            $table->char('time_slot_id')->index();
            $table->timestamps();

            $table->unique(['date', 'time_slot_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('time_slot_id')->references('id')->on('time_slot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
