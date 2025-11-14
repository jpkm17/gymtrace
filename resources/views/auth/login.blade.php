@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <div class="card-content">
                <span class="card-title center">Acesso ao Sistema</span>

                @if($errors->any())
                    <div class="card-panel red lighten-4 red-text text-darken-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="input-field">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="email">E-mail</label>
                    </div>

                    <div class="input-field">
                        <input id="senha" type="password" name="senha" required>
                        <label for="senha">Senha</label>
                    </div>

                    <div class="center">
                        <button type="submit" class="btn blue">
                            <i class="material-icons left">login</i>Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
