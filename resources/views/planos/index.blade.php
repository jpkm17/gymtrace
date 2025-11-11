@extends('layouts.app')

@section('title', 'Gerenciar Planos')

@section('content')
<div class="row">
    <div class="col s12">
        <h4>Planos Cadastrados</h4>

        <a href="{{ route('planos.create') }}" class="btn blue">
            <i class="material-icons left">add</i>Novo Plano
        </a>

        @if(session('success'))
            <div class="card-panel green lighten-4 green-text text-darken-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="striped highlight responsive-table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Duração (dias)</th>
                    <th>Valor (R$)</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($planos as $plano)
                    <tr>
                        <td>{{ $plano->descricao }}</td>
                        <td>{{ $plano->duracao_dias }}</td>
                        <td>{{ number_format($plano->valor, 2, ',', '.') }}</td>
                        <td>
                            @if($plano->ativo)
                                <span class="new badge green" data-badge-caption="Ativo"></span>
                            @else
                                <span class="new badge red" data-badge-caption="Inativo"></span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('planos.edit', $plano->id) }}" class="btn-small blue">
                                <i class="material-icons">edit</i>
                            </a>
                            <form action="{{ route('planos.destroy', $plano->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small red" onclick="return confirm('Deseja excluir este plano?')">
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
