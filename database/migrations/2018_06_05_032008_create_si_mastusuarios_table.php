<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiMastUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('si_mastusuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->boolean('flag_vence')->default(false);
            $table->date('fecha_vence')->nullable();
            $table->string('imagen')->nullable();
            $table->boolean('status')->default(true);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->rememberToken();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

        #Data
        DB::table('si_mastusuarios')->insert([
            ['usuario' => 'admin', 'password' => bcrypt('admin3697*')],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('si_mastusuarios');
    }
}
