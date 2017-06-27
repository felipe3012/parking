<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nit',20);
            $table->string('nombre',50);
            $table->string('direccion',100);
            $table->string('telefono',20);
            $table->integer('stock_carros')->nullable();
            $table->integer('stock_motos')->nullable();
            $table->string('tiempo_gracia',20);
            $table->text('logo');
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
        Schema::drop('configuraciones');
    }
}
