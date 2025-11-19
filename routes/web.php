<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\NotificacaoController;
use Illuminate\Support\Facades\Route;

// ==============================
// ROTAS PÚBLICAS
// ==============================
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ==============================
// ROTAS PROTEGIDAS - TODOS LOGADOS
// ==============================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});


// ==============================
// ROTAS APENAS PARA ADMINISTRADOR
// ==============================
Route::middleware(['auth', 'permission:administrador'])->group(function () {
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('planos', PlanoController::class);
    Route::resource('alunos', AlunoController::class);
    Route::resource('pagamentos', PagamentoController::class);
    Route::resource('notificacoes', NotificacaoController::class);
});


// ==============================
// ROTAS APENAS PARA INSTRUTOR
// ==============================
Route::middleware(['auth', 'permission:instrutor'])->group(function () {
    Route::resource('presencas', PresencaController::class);
    // Route::resource('alunos', AlunoController::class);
});
