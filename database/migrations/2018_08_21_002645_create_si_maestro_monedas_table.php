<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiMaestroMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_maestro_monedas', function (Blueprint $table) {
            $table->increments('id_moneda');
            $table->string('siglas_moneda', 4)->unique();
            $table->string('desc_moneda', 50);
            $table->enum('tipo_moneda', ['L','E'])->default('L');
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
        DB::table('si_maestro_monedas')->insert([
            ['siglas_moneda' => 'VEF', 'desc_moneda' => 'BOLIVARES (VENEZUELA)', 'tipo_moneda' => 'L'],
            ['siglas_moneda' => 'USD', 'desc_moneda' => 'DÓLARES (EE.UU)', 'tipo_moneda' => 'E'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('si_maestro_monedas');
    }
}
