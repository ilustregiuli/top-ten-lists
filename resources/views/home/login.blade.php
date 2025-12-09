@extends('home.master')

@section('content')
    <div>
        <h1 class="michroma-regular">TOP TEN LISTS</h1>
        <section class="login">
            <h2>Login</h2>
            <form action="{{ route('entrar') }}" method="post" autocomplete="off">
                @csrf
                <label for="username">Usuário:</label><br>
                <input type="text" id="username" name="username" required autocomplete="off"><br><br>

                <label for="password">Senha:</label><br>
                <input type="password" id="password" name="password" required autocomplete="off"><br><br>

                <button type="submit">Entrar</button>
            </form>
        </section>
    </div>
@endsection
