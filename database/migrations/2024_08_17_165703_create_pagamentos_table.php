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
            $table->foreignId('usuario_id')->references('id')->on('usuarios');
            $table->foreignId('assinatura_id')->references('id')->on('assinaturas');
            $table->string('collection_id');
            $table->string('collection_status');
            $table->string('payment_id');
            $table->string('status');
            $table->string('payment_type');
            $table->string('preference_id');
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
        // Schema::table('pagamentos', function (Blueprint $table) {
        //     $table->dropForeign(['usuario_id','assinatura_id']);
        //     $table->dropColumn(['usuario_id','assinatura_id']);
        // });
        Schema::dropIfExists('pagamentos');
    }
}
