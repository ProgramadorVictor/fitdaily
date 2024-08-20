<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_imagens', function (Blueprint $table) {
            $table->id();
            $table->string('imagem')->nullable();
            $table->foreignId('usuario_id')->references('id')->on('usuarios');
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
        Schema::table('usuario_imagens', function (Blueprint $table) {
            $table->dropForeign('usuario_imagens_usuario_id_foreign');
            $table->dropColumn('usuario_id');
        });
        Schema::dropIfExists('usuario_imagens');
    }
}
