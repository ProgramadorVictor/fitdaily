<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('identificador');
            $table->string('status_de_pagamento');
            $table->string('tipo_de_pagamento');
            $table->string('transacao_de_pedido');
            $table->timestamps();
        });
        Schema::table('pagamentos', function (Blueprint $table){
            $table->unsignedBigInteger('usuario_id')->after('id');
            $table->unsignedBigInteger('assinatura_id')->after('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('assinatura_id')->references('id')->on('assinaturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagamentos', function (Blueprint $table){
            $table->dropForeign('pagamentos_usuario_id_foreign');
            $table->dropForeign('pagamentos_assinatura_id_foreign');
            $table->dropColumn(['usuario_id','assinatura_id']);
        });
        Schema::dropIfExists('pagamentos');
    }
}
