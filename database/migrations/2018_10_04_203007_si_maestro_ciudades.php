<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiMaestroCiudades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('si_maestro_ciudades', function (Blueprint $table) {
            $table->increments('id_ciudad');
            $table->unsignedInteger('id_estado');
            $table->string('desc_ciudad',255);
            $table->string('cod_postal',100);
            $table->enum('ind_capital', ['S','N'])->default('N'); 
            $table->enum('ind_estado', ['A','I'])->default('A');
            $table->string('ult_usuario', 100)->nullable();
            $table->dateTime('ult_fecha')->nullable();
            $table->string('ult_equipo', 30)->nullable();
            $table->string('ult_ip', 30)->nullable();

            $table->foreign('id_estado')->references('id_estado')->on('si_maestro_estados');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
          });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
          Schema::dropIfExists('si_maestro_ciudades');
    }
}
