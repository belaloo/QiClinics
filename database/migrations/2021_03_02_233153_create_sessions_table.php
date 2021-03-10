<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_number');
            $table->date('session_date');
            $table->time('start_time');
            $table->time('finish_time');
            $table->time('session_duration');
            $table->string('notes');

            $table->boolean('is_sun_exposure_note');
            $table->string('sun_exposure_note');

            $table->boolean('is_pregnancy');
            $table->string('pregnancy');

            $table->boolean('is_injection');
            $table->string('injection');

            $table->boolean('is_use_cream');
            $table->string('use_cream');

            $table->integer('technician_id')->unsigned();
            $table->integer('machine_id')->unsigned();
            $table->integer('patient_id')->unsigned();

            $table->foreign('technician_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('machine_id')->references('id')->on('machines')
                ->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')
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
        Schema::dropIfExists('sessions');
    }
}
