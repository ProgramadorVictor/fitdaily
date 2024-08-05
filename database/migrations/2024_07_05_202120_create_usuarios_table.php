<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email');
            $table->string('cpf', 14)->unique();
            $table->string('celular');
            $table->string('senha', 60);
            $table->string('nascimento');
            $table->timestamp('data_inicio_academia')->nullable();
            $table->timestamp('data_fim_academia')->nullable();
            $table->timestamps();
        });
        Schema::table('usuarios', function (Blueprint $table){
            $table->unsignedBigInteger('tipo_de_conta_id')->after('id')->default(1);
            $table->foreign('tipo_de_conta_id')->references('id')->on('tipo_de_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_tipo_de_conta_id_foreign');
            $table->dropColumn('tipo_de_conta_id');
        });
        Schema::dropIfExists('usuarios');
    }
}
