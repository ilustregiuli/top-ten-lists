@extends('home.master')
C:\Users\giuli\Documents\Programação\WEB BACK\PHP\Laravel - projetos\jornada-laravel-11
@section('title', 'Inscreva-se!')

@section('content')
    <div>
        <h1>TOP TEN LISTS</h1>
        <section class="login">
            <h2>Inscreva-se e comece a cadastrar suas listas!</h2>
            <form action="#" method="post">
                <label for="username">Digite seu e-mail: </label><br>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Escolha uma senha:</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <label for="password">Repita a senha:</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <button type="submit">Cadastrar</button>
            </form>
        </section>
    </div>
@endsection
