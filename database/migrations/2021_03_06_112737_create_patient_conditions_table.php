<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_true');
            $table->string('notes');
            $table->integer('patient_id')->unsigned();
            $table->integer('condition_id')->unsigned();

            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade');
            $table->foreign('condition_id')->references('id')->on('conditions')
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
        Schema::dropIfExists('patient_conditions');
    }
}
