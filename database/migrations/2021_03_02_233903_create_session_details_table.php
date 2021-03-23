<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shots_count');
            $table->float('fluency');
            $table->float('pulse_duration');
            $table->float('spot_size');
            $table->float('rate_delay');
            $table->integer('heir_thinking');
            $table->integer('trated_id')->unsigned();
            $table->integer('skin_type_id')->unsigned();
            $table->integer('session_id')->unsigned();

            $table->foreign('skin_type_id')->references('id')->on('skin_types')
                ->onDelete('cascade');
            $table->foreign('trated_id')->references('id')->on('trated_areas')
                ->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')
                ->onDelete('cascade');

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
        Schema::dropIfExists('session_details');
    }
}
