<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Academia')</title>

    <!-- Materialize CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS customizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="blue darken-3">
        <div class="nav-wrapper container">
            <a href="{{ route('home') }}" class="brand-logo">Academia</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{ route('alunos.index') }}">Alunos</a></li>
                <li><a href="{{ route('planos.index') }}">Planos</a></li>
                <li><a href="{{ route('pagamentos.index') }}">Pagamentos</a></li>
                <li><a href="{{ route('presencas.index') }}">Presenças</a></li>
            </ul>
        </div>
    </nav>

    <main class="container" style="margin-top: 20px;">
        @yield('content')
    </main>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    @stack('scripts')
</body>
</html>
