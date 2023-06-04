<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->string('telefone')->nullable();
            $table->string('cpf')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->integer('genero')->comment('1 - masculino | 2 - feminino | 3 - outros')->default(1);
            $table->string('escolaridade')->nullable();
            $table->integer('zona_residencial')->comment('1 - urbana | 2 - rural')->default(1);
            $table->integer('estado_civil')->comment('1 - solteiro | 2 - casado | 3 - separado | 4 - divorciado | 5 - viuvo | 6 - nao_informar')->default(6);
            $table->integer('orientacao_sexual')->comment('1 - heterossexual | 2 - homossexual | 3 - bissexual | 4 - outros | 5 - nao_informar')->default(5);
            $table->boolean('problema_mental')->default(false);
            $table->string('problema_mental_quais')->nullable();
            $table->boolean('uso_medicamento')->default(false);
            $table->string('uso_medicamento_quais')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('usuarios_extras');
    }
};
