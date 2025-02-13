@extends('home.master')

@section('title', 'Cadastre sua lista!')

@section('content')

    <div>
        <h1>Cadatro de lista</h1>
        <section class="form">
            <form id="createList" action="{{ route('lists.store') }}" method="post">
                @csrf
                <label for="nome_lista">Nome da Lista: </label><br><br>
                <input type="text" id="nome_lista" name="nome_lista" placeholder="Digite a nova lista!" required><br><br>

                <button type="submit">Cria Lista!</button>
            </form>
        </section>

    </div>


@endsection
