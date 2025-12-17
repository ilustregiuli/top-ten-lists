@extends('home.master')

@section('content')

    <div class="text-center">  <!-- Centraliza tudo -->
        <h1 class="font-['Michroma'] text-4xl font-bold text-gray-200 mb-4 drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">TOP TEN LISTS</h1>  <!-- Usa fonte Michroma via Tailwind (configure abaixo) -->
        <h2 class="font-['Michroma'] text-2xl font-bold text-gray-400 mb-2">Escolha seus favoritos</h2>
        <h2 class="font-['Michroma']  text-2xl font-bold text-gray-400 mb-2">Organize e gerencie</h2>
        <h2 class="font-['Michroma']  text-2xl font-bold text-gray-400 mb-2">Compartilhe</h2>
    </div>

    <div class="flex justify-center mt-4">
        <img src="{{ Vite::asset('resources/images/logo.jpg') }}" class="image-center">
    </div>

    @guest
    <div class="text-center mt-4" >
        <a href="{{ route('register') }}" class="hover:text-blue-500 text-gray-600">
            <div class="font-['Michroma'] text-base font-bold text-gray-500 mb-5">Cadastre-se aqui e crie suas listas!</div>
        </a>
    </div>
     @endguest

    
    @auth
     <div class="text-center mt-4" >
        <a href="{{ route('listas.index') }}" class="hover:text-blue-500 text-gray-600">
            <div class="font-['Michroma'] text-base font-bold text-gray-500 mb-5">Minhas listas!</div>
        </a>
    </div>
    @endauth

@endsection



   
