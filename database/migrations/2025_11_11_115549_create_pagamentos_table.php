<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->date('data_pagamento')->default(DB::raw('CURRENT_DATE'));
            $table->decimal('valor', 10, 2);
            $table->enum('status', ['pago', 'pendente', 'atrasado'])->default('pendente');
            $table->timestamps();

            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
