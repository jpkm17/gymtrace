<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

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
            'senha'  => env('ADMIN_SENHA'),  // será criptografada automaticamente
            'perfil' => env('ADMIN_PERFIL', 'administrador'),
        ]);
    }
}
