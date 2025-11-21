@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
    <div class="row">
        <div class="col s12">
            <h4>Lista de Alunos</h4>

            @auth
                @if (Auth::user()->perfil === 'administrador')
                    <a href="{{ route('alunos.create') }}" class="btn blue">Novo Aluno</a>
                @endif
            @endauth


            @if (session('success'))
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
                    @foreach ($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->email }}</td>
                            <td>{{ ucfirst($aluno->status) }}</td>
                            <td>{{ $aluno->plano->descricao ?? '—' }}</td>
                            <td>
                                @if (Auth::user()->perfil === 'administrador')
                                    <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn-small blue">Editar</a>

                                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-small red">Excluir</button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
