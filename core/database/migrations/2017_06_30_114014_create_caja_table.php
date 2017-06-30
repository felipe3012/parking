<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_carros_ingresaron')->nullable();
            $table->integer('no_motos_ingresaron')->nullable();
            $table->integer('par_carros_dispo')->nullable();
            $table->integer('par_motos_dispo')->nullable();
            $table->string('estado')->nullable(); 
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
        Schema::drop('caja');
    }
}
