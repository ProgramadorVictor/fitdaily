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
            $table->integer('tipo')->default(1);
            $table->string('email');
            $table->string('cpf', 14)->unique();
            $table->string('celular');
            $table->string('senha', 60);
            $table->string('nascimento');
            $table->timestamp('data_inicio_academia')->nullable();
            $table->timestamp('data_fim_academia')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
