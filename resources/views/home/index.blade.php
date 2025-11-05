@extends('home.master')

@section('content')

    <div class="text-center">  <!-- Centraliza tudo -->
        <h1 class="font-['Michroma'] text-4xl font-bold text-gray-800 mb-4">TOP TEN LISTS</h1>  <!-- Usa fonte Michroma via Tailwind (configure abaixo) -->
        <h2 class="font-['Michroma'] text-2xl font-bold text-gray-600 mb-2">Escolha seus favoritos</h2>
        <h2 class="font-['Michroma']  text-2xl font-bold text-gray-600 mb-2">Organize e gerencie</h2>
        <h2 class="font-['Michroma']  text-2xl font-bold text-gray-600 mb-2">Compartilhe</h2>
    </div>

    <div class="flex justify-center mt-8">
        <img src="{{ Vite::asset('resources/images/logo.jpg') }}" class="image-center">
    </div>
@endsection



   
