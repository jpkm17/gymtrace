@extends('layouts.app')

@section('title', 'Registrar Presença')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Registrar Presença</h4>

        <form action="{{ route('presencas.store') }}" method="POST">
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
                <select name="instrutor_id" required>
                    <option value="">Selecione o instrutor</option>
                    @foreach($instrutores as $instrutor)
                        <option value="{{ $instrutor->id }}">{{ $instrutor->nome }}</option>
                    @endforeach
                </select>
                <label>Instrutor</label>
            </div>

            <div class="input-field">
                <input id="data_presenca" name="data_presenca" type="date" required>
                <label for="data_presenca">Data da Presença</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Salvar
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
