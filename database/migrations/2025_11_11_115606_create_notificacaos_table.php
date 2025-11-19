<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->text('mensagem');
            $table->enum('tipo', ['vencimento', 'pagamento', 'lembrete'])->default('lembrete');
            $table->timestamp('data_envio')->useCurrent();
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
        Schema::dropIfExists('notificacoes');
    }
};
