@extends('layouts.app')

@section('title', 'Controle de Presenças')

@section('content')
<div class="row">
    <div class="col s12">
        <h4>Registro de Presenças</h4>

        <a href="{{ route('presencas.create') }}" class="btn blue">
            <i class="material-icons left">add</i>Nova Presença
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
                    <th>Instrutor</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($presencas as $p)
                    <tr>
                        <td>{{ $p->aluno->nome ?? '—' }}</td>
                        <td>{{ $p->instrutor->nome ?? '—' }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->data_presenca)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('presencas.edit', $p->id) }}" class="btn-small blue">
                                <i class="material-icons">edit</i>
                            </a>
                            <form action="{{ route('presencas.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small red" onclick="return confirm('Deseja excluir este registro?')">
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
