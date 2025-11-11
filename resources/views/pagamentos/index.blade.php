@extends('layouts.app')

@section('title', 'Pagamentos')

@section('content')
<div class="row">
    <div class="col s12">
        <h4>Pagamentos Registrados</h4>

        <a href="{{ route('pagamentos.create') }}" class="btn blue">
            <i class="material-icons left">add</i>Novo Pagamento
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
                    <th>Data</th>
                    <th>Valor (R$)</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagamentos as $p)
                    <tr>
                        <td>{{ $p->aluno->nome ?? '—' }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->data_pagamento)->format('d/m/Y') }}</td>
                        <td>{{ number_format($p->valor, 2, ',', '.') }}</td>
                        <td>
                            @if($p->status == 'pago')
                                <span class="new badge green" data-badge-caption="Pago"></span>
                            @elseif($p->status == 'pendente')
                                <span class="new badge yellow darken-2" data-badge-caption="Pendente"></span>
                            @else
                                <span class="new badge red" data-badge-caption="Atrasado"></span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pagamentos.edit', $p->id) }}" class="btn-small blue">
                                <i class="material-icons">edit</i>
                            </a>
                            <form action="{{ route('pagamentos.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-small red" onclick="return confirm('Deseja excluir este pagamento?')">
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
