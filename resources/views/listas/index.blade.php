@extends('home.master')

@section('content')

@if ($listas->isEmpty())
    <div class="mb-4"> <!-- classe para espaçamento -->
        <p>Nenhuma lista encontrada.</p>
        <p>(Ei, meio vazio por aqui... vamos cadastrar sua primeira lista?)</p>
    </div>
   
    <div>
        <a href="{{ route('listas.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"> Adicionar Lista </a>
    </div>

@else

    <div class="flex justify-between items-center m-4"> 
        <h1 class="text-2xl font-bold m-4">
            Minhas Listas ({{ ($listas->count())}})
        </h1>
        <a href="{{ route('listas.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"> Adicionar Lista </a>
    </div>

<div class="listas-container">
    @foreach($listas as $lista)
    <div class="lista">
        <h1 class="text-2xl font-bold"> {{ $lista->nome }} </h1>
        <ol class="text-left">
            @for ($i = 1; $i <= 10 ; $i++)
                @php
                    $campo = 'pos_0' . $i;
                    if ($i == 10) {
                        $campo = 'pos_10';
                    }
                @endphp

                @if (!empty($lista->$campo))
                    <li> {{ $i . "º " . $lista->$campo }} </li>
                @endif
            @endfor
        </ol>
        <div class="flex gap-2 mt-4">
            <a href="{{ route('listas.edit', $lista->id) }}" 
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"> Editar </a>
            <form action="{{ route('listas.destroy', $lista->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar esta lista?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"> 
                    Deletar 
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endif

@endsection
