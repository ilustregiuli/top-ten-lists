@extends('home.master')

@section('content')
<div>
    <h1>Lista criada com sucesso!</h1>
    <h2>{{ $lista->nome }}</h2>
    @php
        for ($i = 1; $i  <= 10 ; $i++) {

            $campo = 'pos_0' . $i;

            if ($i == 10) {
                $campo = 'pos_10';
            }

            if (!empty($lista->$campo)) {
                echo $i .  'º '. $lista->$campo . '<br>';
            }
        }
    @endphp
</div>

<div>
    <form action="{{ route('lists.index') }}">
        <button type="submit" class="btn btn-secondary">Voltar Início</button>
    </form>
</div>

@endsection
