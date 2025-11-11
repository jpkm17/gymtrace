@extends('layouts.app')

@section('title', 'Cadastrar Plano')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Cadastrar Plano</h4>

        <form action="{{ route('planos.store') }}" method="POST">
            @csrf

            <div class="input-field">
                <input id="descricao" name="descricao" type="text" required>
                <label for="descricao">Descrição</label>
            </div>

            <div class="input-field">
                <input id="duracao_dias" name="duracao_dias" type="number" min="1" required>
                <label for="duracao_dias">Duração (em dias)</label>
            </div>

            <div class="input-field">
                <input id="valor" name="valor" type="number" step="0.01" min="0" required>
                <label for="valor">Valor (R$)</label>
            </div>

            <div class="input-field">
                <select name="ativo" required>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
                <label>Status</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Salvar
            </button>
            <a href="{{ route('planos.index') }}" class="btn grey">Cancelar</a>
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
