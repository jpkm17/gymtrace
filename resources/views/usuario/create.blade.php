@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Criar Usuário</h4>

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <div class="input-field">
                <input id="nome" name="nome" type="text" required>
                <label for="nome">Nome</label>
            </div>

            <div class="input-field">
                <input id="email" name="email" type="email" required>
                <label for="email">E-mail</label>
            </div>

            <div class="input-field">
                <input id="senha" name="senha" type="password" required>
                <label for="senha">Senha</label>
            </div>

            <div class="input-field">
                <input id="senha_confirmation" name="senha_confirmation" type="password" required>
                <label for="senha_confirmation">Confirmar Senha</label>
            </div>

            <div class="input-field">
                <select name="perfil" required>
                    <option value="administrador">Administrador</option>
                    <option value="instrutor">Instrutor</option>
                </select>
                <label>Perfil</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Salvar
            </button>
            <a href="{{ route('usuarios.index') }}" class="btn grey">Cancelar</a>
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
