@extends('home.master')

@section('title', 'Inscreva-se!')

@section('content')
    <div>
        <h1>TOP TEN LISTS</h1>
        <section class="login">
            <h2>Inscreva-se e comece a cadastrar suas listas!</h2>

            <form id="registroUser" action="{{ route('cadastrar') }}" method="post">
                @csrf
                <label for="name">Digite seu nome: </label><br>
                <input type="text" id="nome" name="nome" required><br><br>

                <label for="username">Digite seu e-mail: </label><br>
                <input type="text" id="email" name="email" required><br><br>

                <label for="password">Escolha uma senha:</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <label for="confirmePassword">Repita a senha:</label><br>
                <input type="password" id="confirmePassword" name="confirmePassword" required><br><br>

                <button type="submit">Cadastrar</button>
                <p id="errorMessage" style="color: red; display: none;">As senhas são diferentes! Digite novamente!</p>
            </form>

        </section>
    </div>

    <script>
        document.getElementById('registroUser').addEventListener('submit',
            function(event) {
                let password = document.getElementById('password').value;
                let confirmePassword = document.getElementById('confirmePassword').value;
                let errorMessage = document.getElementById('errorMessage');
                console.log(password);
                console.log(confirmePassword);
                if (password !== confirmePassword) {
                    event.preventDefault();
                    errorMessage.style.display = 'block';
                } else {
                    errorMessage.style.display = 'none';
                }
            }
        );
    </script>

@endsection


