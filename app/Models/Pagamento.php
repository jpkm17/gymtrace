<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';

    protected $fillable = [
        'aluno_id',
        'data_pagamento',
        'valor',
        'status'
    ];

    // Relacionamento: um pagamento pertence a um aluno
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
}
