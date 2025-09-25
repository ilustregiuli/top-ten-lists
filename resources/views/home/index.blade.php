@extends('home.master')

@section('content')
    <div>
        <h1 class="michroma-regular">TOP TEN LISTS</h1>
        <h2 class="comic-relief-bold"> Escolha seus favoritos </h2>
        <h2 class="comic-relief-bold"> Organize e gerencie </h2>
        <h2 class="comic-relief-bold"> Compartilhe </h2>
    </div>
    <div>
        <img src="{{ Vite::asset('resources/images/logo.jpg') }}" class="image-center">
    </div>
@endsection
