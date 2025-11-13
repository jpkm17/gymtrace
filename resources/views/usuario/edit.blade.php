@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Editar Usuário</h4>

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-field">
                <input id="nome" name="nome" type="text" value="{{ $usuario->nome }}" required>
                <label for="nome" class="active">Nome</label>
            </div>

            <div class="input-field">
                <input id="email" name="email" type="email" value="{{ $usuario->email }}" required>
                <label for="email" class="active">E-mail</label>
            </div>

            <div class="input-field">
                <input id="senha" name="senha" type="password">
                <label for="senha">Nova Senha (opcional)</label>
            </div>

            <div class="input-field">
                <input id="senha_confirmation" name="senha_confirmation" type="password">
                <label for="senha_confirmation">Confirmar Senha</label>
            </div>

            <div class="input-field">
                <select name="perfil" required>
                    <option value="administrador" {{ $usuario->perfil == 'administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="instrutor" {{ $usuario->perfil == 'instrutor' ? 'selected' : '' }}>Instrutor</option>
                </select>
                <label>Perfil</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Atualizar
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
