<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\NotificacaoController;
use Illuminate\Support\Facades\Route;

// === Rotas públicas ===
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// === Rotas protegidas ===
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('usuarios', UsuarioController::class);
    Route::resource('alunos', AlunoController::class);
    Route::resource('planos', PlanoController::class);
    Route::resource('pagamentos', PagamentoController::class);
    Route::resource('presencas', PresencaController::class);
    Route::resource('notificacoes', NotificacaoController::class);
});
