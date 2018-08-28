<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiMiscelaneosDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_miscelaneos_det', function (Blueprint $table) {
            $table->increments('id_miscelaneo_det');
            $table->unsignedInteger('id_miscelaneo');
            $table->string('cod_detalle', 15)->unique();
            $table->string('desc_detalle');
            $table->enum('ind_estado', ['A','I'])->default('A');
            $table->string('ult_usuario', 100)->nullable();
            $table->dateTime('ult_fecha')->nullable();
            $table->string('ult_equipo', 30)->nullable();
            $table->string('ult_ip', 30)->nullable();

            $table->foreign('id_miscelaneo')->references('id_miscelaneo')->on('si_maestro_miscelaneos');

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
        Schema::dropIfExists('si_miscelaneos_det');
    }
}
