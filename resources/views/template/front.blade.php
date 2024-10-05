<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitdaily - @yield('titulo')</title>
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" defer>
    @stack('style')
</head>
<body class="d-flex flex-column">
    <header>
        @include('components.logo.logo')
        @include('components.menu.front.menu')
    </header>
    <main style="flex: 1;" class="align-content-center">
        @include('components.mensagem.mensagem')
        @yield('body')
    </main>
    <script src="{{ asset('js/alert.js') }}" defer></script>
    @yield('script')
</body>
</html>