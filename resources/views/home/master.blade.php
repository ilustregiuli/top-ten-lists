<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TOP TEN LISTS')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <div>Links</div>
        <nav>
            <a href="/">Home</a>
            <a href="/login">Login</a>
            <a href="/subscrive">Inscreva-se!</a>

        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Giuli G. Ilustre - 2025</p>
    </footer>
</body>
</html>
