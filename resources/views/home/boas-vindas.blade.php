@extends('home.master')

@section('title', 'Inscreva-se!')

@section('content')

    <p>Cadastro finalizado com sucesso!</p> 
    <p>Comece cadastrando sua primeira lista:</p>
    
    <a href="{{ route('lists.create') }}" class="link_01">Criar Lista</a>

@endsection
