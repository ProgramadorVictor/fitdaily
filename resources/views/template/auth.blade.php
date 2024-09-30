<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitdaily - @yield('titulo')</title>
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" defer>
</head>
<body>
    <main class="align-content-center h-100">
        @include('components.mensagem.mensagem')
        @yield('body')
    </main>
    <script src="{{ asset('js/auth.js') }}" defer></script>
    <script src="{{ asset('js/alert.js') }}" defer></script>
    <script src="{{ asset('js/mask.js') }}" defer></script>
    @yield('script')
</body>
</html> 