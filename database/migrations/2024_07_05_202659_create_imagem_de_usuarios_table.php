<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagemDeUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagem_de_usuarios', function (Blueprint $table) {
            $table->string('caminho')->nullable();
            $table->timestamps();
        });
        Schema::table('imagem_de_usuarios', function (Blueprint $table){
            $table->unsignedBigInteger('usuario_id')->before('caminho');
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
        Schema::table('imagem_de_usuarios', function (Blueprint $table){
            $table->dropForeign('imagem_de_usuarios_usuario_id_foreign');
            $table->dropColumn('usuario_id');
        });
        Schema::dropIfExists('imagem_de_usuarios');
    }
}
