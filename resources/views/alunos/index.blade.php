@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
<div class="row">
    <div class="col s12">
        <h4>Lista de Alunos</h4>

        <a href="{{ route('alunos.create') }}" class="btn blue">
            <i class="material-icons left">add</i>Novo Aluno
        </a>

        @if(session('success'))
            <div class="card-panel green lighten-4 green-text text-darken-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="striped highlight responsive-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Plano</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ ucfirst($aluno->status) }}</td>
                        <td>{{ $aluno->plano->descricao ?? '—' }}</td>
                        <td>
                            <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn-small blue">
                                <i class="material-icons">edit</i>
                            </a>
                            <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small red" onclick="return confirm('Deseja excluir este aluno?')">
                                    <i class="material-icons">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
