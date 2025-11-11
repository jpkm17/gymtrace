<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('presencas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('instrutor_id');
            $table->date('data_presenca')->default(DB::raw('CURRENT_DATE'));
            $table->timestamps();

            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('instrutor_id')
                ->references('id')
                ->on('usuarios')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presencas');
    }
};
