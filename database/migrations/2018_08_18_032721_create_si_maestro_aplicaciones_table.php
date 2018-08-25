<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiMaestroAplicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_maestro_aplicaciones', function (Blueprint $table) {
            $table->increments('id_aplicacion');
            $table->string('cod_acronimo_aplicacion', 4)->unique();
            $table->string('desc_nombre_modulo', 100);
            $table->string('desc_descripcion_modulo')->nullable();
            $table->unsignedInteger('id_misc_det_sist_fuente')->nullable();
            $table->unsignedInteger('id_dependencia')->nullable();   //cod_dependencia
            $table->enum('ind_estado', ['A','I'])->default('A');
            $table->string('ult_usuario', 100)->nullable();
            $table->dateTime('ult_fecha')->nullable();
            $table->string('ult_equipo', 30)->nullable();
            $table->string('ult_ip', 30)->nullable();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        #Data
        DB::table('si_maestro_aplicaciones')->insert([
            ['cod_acronimo_aplicacion' => 'RH', 'desc_nombre_modulo' => 'RECURSOS HUMANOS'],
            ['cod_acronimo_aplicacion' => 'NO', 'desc_nombre_modulo' => 'NÓMINA'],
            ['cod_acronimo_aplicacion' => 'CO', 'desc_nombre_modulo' => 'CONTABILIDAD'],
            ['cod_acronimo_aplicacion' => 'SI', 'desc_nombre_modulo' => 'SISTEMA'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('si_maestro_aplicaciones');
    }
}
