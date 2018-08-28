<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiMaestroPaises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('si_maestro_paises', function (Blueprint $table) {
          $table->increments('id_pais');
          $table->string('desc_pais', 200);
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
      DB::table('si_maestro_paises')->insert([
          ['desc_pais' => 'VENEZUELA'],
          ['desc_pais' => 'HOLANDA'],
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('si_maestro_paises');
    }
}
