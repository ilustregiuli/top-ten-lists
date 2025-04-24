@extends('home.master')

@section('content')

@foreach($listas as $lista)
    <div class="lista">
        <h3> {{ $lista->nome }} </h3>
        <ol>
            @for ($i = 1; $i <= 10 ; $i++)
                @php
                    $campo = 'pos_0' . $i;
                    if ($i == 10) {
                        $campo = 'pos_10';
                    }
                @endphp

                @if (!empty($lista->$campo))
                    <li> {{ $lista->$campo }} </li>
                @endif
            @endfor
        </ol>
    </div>
@endforeach

@endsection
