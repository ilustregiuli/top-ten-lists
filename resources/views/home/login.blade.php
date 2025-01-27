@extends('home.master')

@section('content')
    <div>
        <h1>TOP TEN LISTS</h1>
        <section class="login">
            <h2>Login</h2>
            <form action="#" method="post">
                <label for="username">Usuário:</label><br>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Senha:</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <button type="submit">Entrar</button>
            </form>
        </section>
    </div>
@endsection
