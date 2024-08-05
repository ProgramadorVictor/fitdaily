<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinos', function (Blueprint $table) {
            $table->id();
            $table->json('treino');
            $table->timestamps();
        });
        Schema::table('treinos', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->after('id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treinos', function (Blueprint $table) {
            $table->dropForeign('treinos_usuario_id_foreign');
            $table->dropColumn('usuario_id');
        });
        Schema::dropIfExists('treinos');
    }
}
