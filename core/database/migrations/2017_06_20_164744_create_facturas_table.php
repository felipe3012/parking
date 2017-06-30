<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servicio')->nullable();
            $table->string('valor_servicio')->nullable();
            $table->string('tipo_vehiculo');
            $table->string('tiempo_gracia')->nullable();
            $table->string('tiempo_cortesia')->nullable();
            $table->string('tiempo');
            $table->string('tarifa');
            $table->string('subtotal');
            $table->string('iva');
            $table->string('iva_fijado'); 
            $table->string('total');
            $table->string('cajero');
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
        Schema::drop('facturas');
    }
}
