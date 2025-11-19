@extends('layouts.app')

@section('title', 'Criar Notificação')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Criar Notificação</h4>

        <form action="{{ route('notificacoes.store') }}" method="POST">
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
                <select name="tipo" required>
                    <option value="vencimento">Vencimento</option>
                    <option value="pagamento">Pagamento</option>
                    <option value="lembrete">Lembrete</option>
                </select>
                <label>Tipo de Notificação</label>
            </div>

            <div class="input-field">
                <textarea id="mensagem" name="mensagem" class="materialize-textarea" required></textarea>
                <label for="mensagem">Mensagem</label>
            </div>

            <div class="input-field">
                <input id="data_envio" name="data_envio" type="datetime-local" required>
                <label for="data_envio">Data e Hora de Envio</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">send</i>Enviar
            </button>
            <a href="{{ route('notificacoes.index') }}" class="btn grey">Cancelar</a>
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
