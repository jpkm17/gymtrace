<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Evita duplicações caso o seed seja rodado novamente
        if (Usuario::where('email', env('ADMIN_EMAIL'))->exists()) {
            return;
        }

        Usuario::create([
            'nome'   => env('ADMIN_NOME', 'Administrador'),
            'email'  => env('ADMIN_EMAIL'),
            'senha'  => Hash::make(env('ADMIN_SENHA')),  // será criptografada automaticamente
            'perfil' => env('ADMIN_PERFIL', 'administrador'),
        ]);
    }
}
