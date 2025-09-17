@extends('home.master')

@section('content')
    <div>
        <h1>TOP TEN LISTS</h1>
        <h2> Escolha seus favoritos </h2>
        <h2> Organize e gerencie </h2>
        <h2> Compartilhe </h2>
    </div>
    <div>
        <img src="{{ Vite::asset('resources/images/logo.jpg') }}" class="image-center">
    </div>
@endsection
