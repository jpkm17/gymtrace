<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'perfil'
    ];

    protected $hidden = [
        'senha'
    ];

    public $timestamps = true;

    // Mutator para criptografar a senha automaticamente
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }
}
