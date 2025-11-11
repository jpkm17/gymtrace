@extends('layouts.app')

@section('title', 'Editar Plano')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Editar Plano</h4>

        <form action="{{ route('planos.update', $plano->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-field">
                <input id="descricao" name="descricao" type="text" value="{{ $plano->descricao }}" required>
                <label for="descricao" class="active">Descrição</label>
            </div>

            <div class="input-field">
                <input id="duracao_dias" name="duracao_dias" type="number" min="1" value="{{ $plano->duracao_dias }}" required>
                <label for="duracao_dias" class="active">Duração (em dias)</label>
            </div>

            <div class="input-field">
                <input id="valor" name="valor" type="number" step="0.01" value="{{ $plano->valor }}" required>
                <label for="valor" class="active">Valor (R$)</label>
            </div>

            <div class="input-field">
                <select name="ativo" required>
                    <option value="1" {{ $plano->ativo ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ !$plano->ativo ? 'selected' : '' }}>Inativo</option>
                </select>
                <label>Status</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Atualizar
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
