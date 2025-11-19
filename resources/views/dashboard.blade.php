@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Saudação --}}
    <h4 class="center-align">
        Bem-vindo, {{ Auth::user()->nome }}!
    </h4>

    <p class="center-align grey-text">
        Perfil: {{ ucfirst(Auth::user()->perfil) }}
    </p>

    <div class="row">

        {{-- ================= Administrador ================= --}}
        @if(Auth::user()->perfil === 'administrador')

            {{-- Usuários --}}
            <div class="col s12 m4">
                <a href="{{ route('usuarios.index') }}">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <i class="material-icons large">group</i>
                            <h6><strong>Gerenciar Usuários</strong></h6>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Planos --}}
            <div class="col s12 m4">
                <a href="{{ route('planos.index') }}">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <i class="material-icons large">assignment</i>
                            <h6><strong>Planos</strong></h6>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Alunos --}}
            <div class="col s12 m4">
                <a href="{{ route('alunos.index') }}">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <i class="material-icons large">person</i>
                            <h6><strong>Alunos</strong></h6>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Pagamentos --}}
            <div class="col s12 m4">
                <a href="{{ route('pagamentos.index') }}">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <i class="material-icons large">attach_money</i>
                            <h6><strong>Pagamentos</strong></h6>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Notificações --}}
            <div class="col s12 m4">
                <a href="{{ route('notificacoes.index') }}">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <i class="material-icons large">notifications</i>
                            <h6><strong>Notificações</strong></h6>
                        </div>
                    </div>
                </a>
            </div>

        @endif


        {{-- ================= Instrutor ================= --}}
        @if(Auth::user()->perfil === 'instrutor')

            {{-- Presenças --}}
            <div class="col s12 m4">
                <a href="{{ route('presencas.index') }}">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <i class="material-icons large">check_circle</i>
                            <h6><strong>Presenças</strong></h6>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Alunos (visualização permitida) --}}
            <div class="col s12 m4">
                <a href="{{ route('alunos.index') }}">
                    <div class="card hoverable">
                        <div class="card-content center">
                            <i class="material-icons large">person</i>
                            <h6><strong>Alunos</strong></h6>
                        </div>
                    </div>
                </a>
            </div>

        @endif

    </div>

</div>
@endsection
