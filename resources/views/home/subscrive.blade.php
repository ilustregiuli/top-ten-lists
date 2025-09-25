@extends('home.master')

@section('title', 'Inscreva-se!')

@section('content')
    <div>
        <h1 class="michroma-regular">TOP TEN LISTS</h1>
        <section class="form">
            <h2>Inscreva-se e comece a cadastrar suas listas!</h2>

            <form id="registroUser" action="{{ route('cadastrar') }}" method="post">
                @csrf
                <label for="name">Digite seu nome: </label><br>
                <input type="text" id="nome" name="nome" placeholder="Ex: João da Silva" required><br><br>

                <label for="username">Digite seu e-mail: </label><br>
                <input type="text" id="email" name="email" placeholder="Ex: seu_email@servidor.com" required><br><br>

                <label for="password">Escolha uma senha:</label><br>
                <input type="password" id="password" name="password" placeholder="Senha" required><br><br>

                <label for="confirmePassword">Repita a senha:</label><br>
                <input type="password" id="confirmePassword" name="confirmePassword" placeholder="Repita a Senha"  required><br><br>

                <button type="submit">Cadastrar</button>
                <p id="errorMessage" style="color: red; display: none;">As senhas são diferentes! Digite novamente!</p>
            </form>

        </section>
    </div>

    <script>
        // código que verifica se as duas senhas digitadas são iguais
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


