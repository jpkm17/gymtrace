<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'contato',
        'email',
        'status',
        'plano_id',
        'criado_por'
    ];

    // Relacionamentos
    public function plano()
    {
        return $this->belongsTo(Plano::class, 'plano_id');
    }

    public function criador()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }
}
