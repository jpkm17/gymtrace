@extends('layouts.app')

@section('title', 'Editar Presença')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Editar Presença</h4>

        <form action="{{ route('presencas.update', $presenca->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-field">
                <select name="aluno_id" required>
                    @foreach($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ $presenca->aluno_id == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
                <label>Aluno</label>
            </div>

            <div class="input-field">
                <select name="instrutor_id" required>
                    @foreach($instrutores as $instrutor)
                        <option value="{{ $instrutor->id }}" {{ $presenca->instrutor_id == $instrutor->id ? 'selected' : '' }}>
                            {{ $instrutor->nome }}
                        </option>
                    @endforeach
                </select>
                <label>Instrutor</label>
            </div>

            <div class="input-field">
                <input id="data_presenca" name="data_presenca" type="date" value="{{ $presenca->data_presenca }}" required>
                <label for="data_presenca" class="active">Data da Presença</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Atualizar
            </button>
            <a href="{{ route('presencas.index') }}" class="btn grey">Cancelar</a>
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
