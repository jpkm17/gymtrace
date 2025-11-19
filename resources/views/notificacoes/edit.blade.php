@extends('layouts.app')

@section('title', 'Editar Notificação')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Editar Notificação</h4>

        <form action="{{ route('notificacoes.update', $notificacao->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-field">
                <select name="aluno_id" required>
                    @foreach($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ $notificacao->aluno_id == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
                <label>Aluno</label>
            </div>

            <div class="input-field">
                <select name="tipo" required>
                    <option value="vencimento" {{ $notificacao->tipo == 'vencimento' ? 'selected' : '' }}>Vencimento</option>
                    <option value="pagamento" {{ $notificacao->tipo == 'pagamento' ? 'selected' : '' }}>Pagamento</option>
                    <option value="lembrete" {{ $notificacao->tipo == 'lembrete' ? 'selected' : '' }}>Lembrete</option>
                </select>
                <label>Tipo de Notificação</label>
            </div>

            <div class="input-field">
                <textarea id="mensagem" name="mensagem" class="materialize-textarea" required>{{ $notificacao->mensagem }}</textarea>
                <label for="mensagem" class="active">Mensagem</label>
            </div>

            <div class="input-field">
                <input id="data_envio" name="data_envio" type="datetime-local"
                       value="{{ \Carbon\Carbon::parse($notificacao->data_envio)->format('Y-m-d\TH:i') }}" required>
                <label for="data_envio" class="active">Data e Hora de Envio</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Atualizar
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
