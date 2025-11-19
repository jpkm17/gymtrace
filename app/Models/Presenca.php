<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    use HasFactory;

    protected $table = 'presencas';

    protected $fillable = [
        'aluno_id',
        'instrutor_id',
        'data_presenca'
    ];

    // Relacionamentos
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    public function instrutor()
    {
        return $this->belongsTo(Usuario::class, 'instrutor_id');
    }
}
