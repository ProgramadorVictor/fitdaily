<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitdaily - @yield('titulo')</title>
    <meta name="theme-color" content="#000000">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM7aE8twPoeaN7pU+mQmM01x5dxAxZVt9x1jZ5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" integrity="sha384-ZD3KXBXpB3O9K3Oe58hB5p0eAKB1Za+5h5tb9/30Zz3J2q5uK7PaC8fR4T5k/9R+" crossorigin="anonymous">
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
        <form class="col-12 d-flex align-items-center">
            <input type="text" id="txtMensagem" placeholder="Envie uma mensagem" required class="form-control me-2 border-0 shadow-sm bg-light rounded-pill" style="border-radius: 25px;">
            <button type="submit" class="btn btn-primary bg-custom-red border-red shadow-sm rounded-circle text-center" style="width: 40px; height: 40px; border-color: black !important;">
                <i class="fas fa-paper-plane fa-1x"></i>
            </button>
        </form>
    </footer>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- <script src="{{asset('js/script.js')}}"></script> --}}
    @yield('script')
</body>
</html>
