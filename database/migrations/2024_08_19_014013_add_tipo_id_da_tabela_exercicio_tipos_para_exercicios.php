<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoIdDaTabelaExercicioTiposParaExercicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exercicios', function (Blueprint $table) {
            $table->foreignId('tipo_id')->after('id')->references('id')->on('exercicio_tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('exercicios', function (Blueprint $table) {
        //     $table->dropForeign('exercicio_tipo_id_foreign');
        // });
    }
}

