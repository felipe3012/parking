<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->dateTime('fecha_fin')->nullable();
            $table->integer('servicio')->nullable(); 
            $table->integer('id_tipo_vehiculo');
            $table->integer('cortesia')->nullable()->default(0);  
            $table->integer('estado')->nullable()->default(1);
            $table->integer('cajero');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
