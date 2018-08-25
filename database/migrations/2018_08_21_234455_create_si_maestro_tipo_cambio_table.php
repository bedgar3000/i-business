<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiMaestroTipoCambioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_maestro_tipo_cambio', function (Blueprint $table) {
            $table->increments('id_tipo_cambio');
            $table->unsignedInteger('id_moneda_origen');
            $table->unsignedInteger('id_moneda_destino');
            $table->date('fecha_cambio');
            $table->decimal('factor_compra', 16, 5);
            $table->decimal('factor_venta', 16, 5);
            $table->decimal('factor_promedio', 16, 5);
            $table->enum('ind_estado', ['A','I'])->default('A');
            $table->string('ult_usuario', 100)->nullable();
            $table->dateTime('ult_fecha')->nullable();
            $table->string('ult_equipo', 30)->nullable();
            $table->string('ult_ip', 30)->nullable();

            $table->unique(['id_moneda_origen', 'id_moneda_destino', 'fecha_cambio'], 'uk_si_maestro_tipo_cambio_1');
            $table->foreign('id_moneda_origen')->references('id_moneda')->on('si_maestro_monedas');
            $table->foreign('id_moneda_destino')->references('id_moneda')->on('si_maestro_monedas');

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
        Schema::dropIfExists('si_maestro_tipo_cambio');
    }
}
