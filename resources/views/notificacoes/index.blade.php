@extends('layouts.app')

@section('title', 'Notificações')

@section('content')
<div class="row">
    <div class="col s12">
        <h4>Notificações Enviadas</h4>

        <a href="{{ route('notificacoes.create') }}" class="btn blue">
            <i class="material-icons left">add</i>Nova Notificação
        </a>

        @if(session('success'))
            <div class="card-panel green lighten-4 green-text text-darken-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="striped highlight responsive-table">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Tipo</th>
                    <th>Mensagem</th>
                    <th>Data de Envio</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notificacoes as $n)
                    <tr>
                        <td>{{ $n->aluno->nome ?? '—' }}</td>
                        <td>{{ ucfirst($n->tipo) }}</td>
                        <td>{{ Str::limit($n->mensagem, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($n->data_envio)->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('notificacoes.edit', $n->id) }}" class="btn-small blue">
                                <i class="material-icons">edit</i>
                            </a>
                            <form action="{{ route('notificacoes.destroy', $n->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small red" onclick="return confirm('Deseja excluir esta notificação?')">
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
