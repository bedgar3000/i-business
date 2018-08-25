<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiMaestroParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_maestro_parametros', function (Blueprint $table) {
            $table->increments('id_parametro');
            $table->unsignedInteger('id_aplicacion');
            $table->string('cod_parametro_clave', 15)->unique();
            $table->string('desc_parametro');
            $table->text('exp_parametro')->nullable();
            $table->enum('tipo_parametro', ['S','V'])->default('S');
            $table->enum('tipo_valor', ['T','N','F'])->default('T');
            $table->text('valor_parametro');
            $table->boolean('flag_comun_compania')->default(true);
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
        Schema::dropIfExists('si_maestro_parametros');
    }
}
