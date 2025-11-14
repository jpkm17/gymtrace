@extends('layouts.app')

@section('title', 'Painel Principal')

@section('content')
<div class="container">
    <h4>Bem-vindo, {{ Auth::user()->nome }}!</h4>
    <p>Perfil: <b>{{ ucfirst(Auth::user()->perfil) }}</b></p>

    <div class="section">
        <a href="{{ route('alunos.index') }}" class="btn blue">Gerenciar Alunos</a>
        <a href="{{ route('planos.index') }}" class="btn green">Gerenciar Planos</a>
        <a href="{{ route('pagamentos.index') }}" class="btn orange">Pagamentos</a>
        <a href="{{ route('presencas.index') }}" class="btn teal">Presenças</a>
        <a href="{{ route('notificacoes.index') }}" class="btn purple">Notificações</a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn red">Sair</button>
    </form>
</div>
@endsection
