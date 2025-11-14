<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistema Academia</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav class="blue">
    <div class="nav-wrapper container">
        <a href="{{ route('dashboard') }}" class="brand-logo">Academia</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-flat white-text">Sair</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container section">
    @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@stack('scripts')
</body>
</html>
