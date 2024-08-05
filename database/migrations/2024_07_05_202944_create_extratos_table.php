<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extratos', function (Blueprint $table) {
            $table->timestamp('data_pagamento')->nullable();
            $table->timestamp('data_vencimento')->nullable();
            $table->timestamps();
        });
        Schema::table('extratos', function (Blueprint $table){
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('assinatura_id');
            $table->unsignedBigInteger('pagamento_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('pagamento_id')->references('id')->on('pagamentos');
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
        Schema::table('extratos', function (Blueprint $table) {
            $table->dropForeign('extratos_usuario_id_foreign');
            $table->dropForeign('extratos_pagamento_id_foreign');
            $table->dropForeign('extratos_assinatura_id_foreign');
            $table->dropColumn(['usuario_id','pagamento_id','assinatura_id']);
        });
        Schema::dropIfExists('extratos');
    }
}
