<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AlunoController, PlanoController, PagamentoController, PresencaController, NotificacaoController, AuthController, UsuarioController
};

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');

// Rotas protegidas
Route::resource('alunos', AlunoController::class);
Route::resource('planos', PlanoController::class);
Route::resource('pagamentos', PagamentoController::class);
Route::resource('presencas', PresencaController::class);
Route::resource('notificacoes', NotificacaoController::class);

Route::resource('usuarios', UsuarioController::class);

