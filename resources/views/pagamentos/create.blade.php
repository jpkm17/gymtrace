@extends('layouts.app')

@section('title', 'Registrar Pagamento')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Registrar Pagamento</h4>

        <form action="{{ route('pagamentos.store') }}" method="POST">
            @csrf

            <div class="input-field">
                <select name="aluno_id" required>
                    <option value="">Selecione o aluno</option>
                    @foreach($alunos as $aluno)
                        <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                    @endforeach
                </select>
                <label>Aluno</label>
            </div>

            <div class="input-field">
                <input id="data_pagamento" name="data_pagamento" type="date" required>
                <label for="data_pagamento">Data do Pagamento</label>
            </div>

            <div class="input-field">
                <input id="valor" name="valor" type="number" step="0.01" min="0" required>
                <label for="valor">Valor (R$)</label>
            </div>

            <div class="input-field">
                <select name="status" required>
                    <option value="pendente">Pendente</option>
                    <option value="pago">Pago</option>
                    <option value="atrasado">Atrasado</option>
                </select>
                <label>Status</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Salvar
            </button>
            <a href="{{ route('pagamentos.index') }}" class="btn grey">Cancelar</a>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
});
</script>
@endpush
@endsection
