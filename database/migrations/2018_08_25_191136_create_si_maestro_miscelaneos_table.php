<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiMaestroMiscelaneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_maestro_miscelaneos', function (Blueprint $table) {
            $table->increments('id_miscelaneo');
            $table->unsignedInteger('id_aplicacion');
            $table->string('cod_maestro', 15)->unique();
            $table->string('nom_maestro');
            $table->text('desc_maestro')->nullable();
            $table->enum('ind_estado', ['A','I'])->default('A');
            $table->string('ult_usuario', 100)->nullable();
            $table->dateTime('ult_fecha')->nullable();
            $table->string('ult_equipo', 30)->nullable();
            $table->string('ult_ip', 30)->nullable();

            $table->foreign('id_aplicacion')->references('id_aplicacion')->on('si_maestro_aplicaciones');

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
        Schema::dropIfExists('si_maestro_miscelaneos');
    }
}
