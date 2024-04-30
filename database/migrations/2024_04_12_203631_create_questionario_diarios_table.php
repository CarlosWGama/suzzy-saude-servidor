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
        Schema::create('questionarios_diarios', function (Blueprint $table) {
            $table->id();
            $table->integer('tristeza')->comment('1 - Triste | 2 - Mal | 3 - Neutro | 4 - Bem | 5 - Feliz');
            $table->integer('choro');
            $table->integer('medo');
            $table->integer('desconcentracao');
            $table->integer('nauseas');
            $table->integer('insonia');
            $table->integer('higiene');
            $table->integer('isolamento');
            $table->date('dia');
            $table->foreignId('usuario_id')->references('id')->on('usuarios')->cascadeOnDelete();
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
        Schema::dropIfExists('questionarios_diarios');
    }
};
