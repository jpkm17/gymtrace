@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Cadastrar Aluno</h4>

        <form action="{{ route('alunos.store') }}" method="POST">
            @csrf

            <div class="input-field">
                <input id="nome" name="nome" type="text" required>
                <label for="nome">Nome</label>
            </div>

            <div class="input-field">
                <input id="data_nascimento" name="data_nascimento" type="date" required>
                <label for="data_nascimento">Data de Nascimento</label>
            </div>

            <div class="input-field">
                <input id="contato" name="contato" type="text">
                <label for="contato">Contato</label>
            </div>

            <div class="input-field">
                <input id="email" name="email" type="email" required>
                <label for="email">Email</label>
            </div>

            <div class="input-field">
                <select name="status" required>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                    <option value="inadimplente">Inadimplente</option>
                </select>
                <label>Status</label>
            </div>

            <div class="input-field">
                <select name="plano_id" required>
                    <option value="">Selecione um plano</option>
                    @foreach($planos as $plano)
                        <option value="{{ $plano->id }}">{{ $plano->descricao }}</option>
                    @endforeach
                </select>
                <label>Plano</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Salvar
            </button>
            <a href="{{ route('alunos.index') }}" class="btn grey">Cancelar</a>
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
