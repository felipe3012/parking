<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_perfil');
            $table->integer('id_funcionalidad');
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->foreign('id_funcionalidad')->references('id')->on('funcionalidades');
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
        Schema::drop('permisos');
    }
}
