<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_consumables', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('session_id')->unsigned();
            $table->integer('consumable_id')->unsigned();
            $table->integer('quantity');
            $table->foreign('session_id')->references('id')->on('sessions')
                ->onDelete('cascade');
            $table->foreign('consumable_id')->references('id')->on('consumables')
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
        Schema::dropIfExists('session_consumables');
    }
}
