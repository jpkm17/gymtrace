@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="center-align">Editar Aluno</h4>

    <div class="row">
        <div class="col s12 m8 offset-m2">

            {{-- Exibir erros --}}
            @if($errors->any())
                <div class="card red lighten-4">
                    <div class="card-content">
                        <span class="card-title red-text">Erros Encontrados:</span>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="red-text">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nome --}}
                <div class="input-field">
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $aluno->nome) }}" required>
                    <label for="nome" class="active">Nome</label>
                </div>

                {{-- Data de Nascimento --}}
                <div class="input-field">
                    <input type="date" name="data_nascimento" id="data_nascimento"
                        value="{{ old('data_nascimento', $aluno->data_nascimento) }}" required>
                    <label for="data_nascimento" class="active">Data de Nascimento</label>
                </div>

                {{-- Contato --}}
                <div class="input-field">
                    <input type="text" name="contato" id="contato"
                        value="{{ old('contato', $aluno->contato) }}">
                    <label for="contato" class="active">Contato</label>
                </div>

                {{-- Email --}}
                <div class="input-field">
                    <input type="email" name="email" id="email"
                        value="{{ old('email', $aluno->email) }}" required>
                    <label for="email" class="active">Email</label>
                </div>

                {{-- Plano --}}
                <div class="input-field">
                    <select name="plano_id" required>
                        <option value="" disabled>Selecione o plano</option>

                        @foreach($planos as $plano)
                            <option value="{{ $plano->id }}"
                                {{ $aluno->plano_id == $plano->id ? 'selected' : '' }}>
                                {{ $plano->descricao }} - R$ {{ number_format($plano->valor, 2, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    <label>Plano</label>
                </div>

                {{-- Status --}}
                <div class="input-field">
                    <select name="status" required>
                        <option value="ativo" {{ $aluno->status === 'ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="inativo" {{ $aluno->status === 'inativo' ? 'selected' : '' }}>Inativo</option>
                        <option value="inadimplente" {{ $aluno->status === 'inadimplente' ? 'selected' : '' }}>Inadimplente</option>
                    </select>
                    <label>Status do Aluno</label>
                </div>

                {{-- Botões --}}
                <div class="center-align">
                    <a href="{{ route('alunos.index') }}" class="btn grey">Voltar</a>
                    <button type="submit" class="btn blue">Salvar Alterações</button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Inicializa selects do Materialize --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        M.FormSelect.init(elems);
    });
</script>

@endsection
