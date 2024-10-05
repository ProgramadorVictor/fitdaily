<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitdaily - @yield('titulo')</title>
    <meta name="theme-color" content="#000000">
    <script src="{{ mix('js/app.js') }}"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" defer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM7aE8twPoeaN7pU+mQmM01x5dxAxZVt9x1jZ5" crossorigin="anonymous">
</head>
<body class="d-flex flex-column">
    <header>
        @include('components.logo.logo')
        @include('components.menu.front.menu')
    </header>
    <main style="flex: 1;">
        @include('components.mensagem.mensagem')
        @yield('body')
    </main>
    <footer class="col-12 d-flex justify-content-center bg-custom-black">
        @component('components.chat.chat')
        @endcomponent
    </footer>
    <script src="{{ asset('js/alert.js') }}" defer></script>
    @yield('script')
</body>
</html>
