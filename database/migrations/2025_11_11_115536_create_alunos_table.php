<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_nascimento');
            $table->string('contato', 20)->nullable();
            $table->string('email', 100)->unique();
            $table->enum('status', ['ativo', 'inativo', 'inadimplente'])->default('ativo');
            $table->unsignedBigInteger('plano_id');
            $table->unsignedBigInteger('criado_por')->nullable();
            $table->timestamps();

            $table->foreign('plano_id')->references('id')->on('planos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('criado_por')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
