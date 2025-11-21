@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detalhes do Aluno</h4>

    <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
    <p><strong>Email:</strong> {{ $aluno->email }}</p>
    <p><strong>Plano:</strong> {{ $aluno->plano->descricao }}</p>
    <p><strong>Status:</strong> {{ $aluno->status }}</p>

    <a href="{{ route('alunos.index') }}" class="btn grey">Voltar</a>
</div>
@endsection
