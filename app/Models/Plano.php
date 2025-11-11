<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $table = 'planos';

    protected $fillable = [
        'descricao',
        'duracao_dias',
        'valor',
        'ativo'
    ];

    // Relacionamento: um plano pode ter vários alunos
    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'plano_id');
    }
}
