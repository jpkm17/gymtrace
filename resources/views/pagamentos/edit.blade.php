@extends('layouts.app')

@section('title', 'Editar Pagamento')

@section('content')
<div class="row">
    <div class="col s12 m8 offset-m2">
        <h4>Editar Pagamento</h4>

        <form action="{{ route('pagamentos.update', $pagamento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-field">
                <select name="aluno_id" required>
                    @foreach($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ $pagamento->aluno_id == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
                <label>Aluno</label>
            </div>

            <div class="input-field">
                <input id="data_pagamento" name="data_pagamento" type="date"
                       value="{{ $pagamento->data_pagamento }}" required>
                <label for="data_pagamento" class="active">Data do Pagamento</label>
            </div>

            <div class="input-field">
                <input id="valor" name="valor" type="number" step="0.01" value="{{ $pagamento->valor }}" required>
                <label for="valor" class="active">Valor (R$)</label>
            </div>

            <div class="input-field">
                <select name="status" required>
                    <option value="pago" {{ $pagamento->status == 'pago' ? 'selected' : '' }}>Pago</option>
                    <option value="pendente" {{ $pagamento->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="atrasado" {{ $pagamento->status == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
                </select>
                <label>Status</label>
            </div>

            <button class="btn blue" type="submit">
                <i class="material-icons left">save</i>Atualizar
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
