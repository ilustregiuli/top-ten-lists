<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TOP TEN LISTS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <header>
        <div></div>
        <nav>
            <a href="/">Home</a>
            @guest
                <a href="/login">Login</a>
                <a href="{{ route('register') }}">Inscreva-se!</a>
            @endguest

            @auth
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: red; border: none; color: inherit; text-decoration: underline; cursor: pointer; font: inherit;">
                        Logout
                    </button>
                </form>
            @endauth

        </nav>
    </header>

    <main>


        <div>
            @yield('content')
        </div>   
    </main>

    <footer>
        <p>Giuli G. Ilustre - 2025</p>
    </footer>
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if (session('error'))
        <x-alert type="error" :message="session('error')" />
    @endif

    @if (session('warning'))
        <x-alert type="warning" :message="session('warning')" />
    @endif

    @if (session('info'))
        <x-alert type="info" :message="session('info')" />
@endif

</body>
</html>
