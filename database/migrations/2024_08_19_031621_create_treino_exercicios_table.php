<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoExerciciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treino_exercicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treino_id')->constrained('treinos')->onDelete('cascade');
            $table->foreignId('exercicio_id')->constrained('exercicios')->onDelete('cascade');
            $table->string('repeticoes');
            $table->string('serie');
            $table->string('carga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treino_exercicios', function (Blueprint $table) {
            $table->dropForeign(['treino_id']);
            $table->dropForeign(['exercicio_id']);
        });
        Schema::dropIfExists('treino_exercicios');
    }
}
