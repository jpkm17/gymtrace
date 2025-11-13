@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
<div class="row">
    <div class="col s12">
        <h4>Usuários do Sistema</h4>

        <a href="{{ route('usuarios.create') }}" class="btn blue">
            <i class="material-icons left">add</i>Novo Usuário
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
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $u)
                    <tr>
                        <td>{{ $u->nome }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ ucfirst($u->perfil) }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $u->id) }}" class="btn-small blue">
                                <i class="material-icons">edit</i>
                            </a>
                            <form action="{{ route('usuarios.destroy', $u->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small red" onclick="return confirm('Deseja excluir este usuário?')">
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
