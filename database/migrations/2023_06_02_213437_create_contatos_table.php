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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone');
            $table->foreignId('usuario_id')->references('id')->on('usuarios')->cascadeOnDelete();
            $table->integer('relacionamento')->comment('1 - Pai | 2 - Mãe | 3 - Irmã(o) | 4 - Amigo(a) | 5 - Parente | 6 - Outro');
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
        Schema::dropIfExists('contatos');
    }
};
