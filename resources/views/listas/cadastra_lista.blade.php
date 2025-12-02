@extends('home.master')

@section('title', 'Cadastre sua lista!')

@section('content')

    <style>
        .hidden { display: none; }
    </style>

    <div>
        <h1 class="text-4xl font-bold">{{ isset($lista) ? 'Editar Lista' : 'Cadastro de nova lista' }}</h1>
        <section class="form">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="createList" action="{{ isset($lista) ? route('listas.update', $lista->id) : route('listas.store') }}" method="post">
                @csrf
                @if(isset($lista))
                    @method('PUT')
                @endif

                <div>
                    <label for="listName" class="text-2xl font-bold">Nome da Lista: </label><br><br>
                    <input 
                    type="text" 
                    id="listName" 
                    name="listName" 
                    value="{{ isset($lista) ? $lista->nome : old('listName') }}"
                    placeholder="Digite o nome da lista!" required
                    >
                    <br><br>
                </div>

                <div>
                    <button 
                        type="button" 
                        id="addPositions" 
                        onclick="insertPositions()"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                    > 
                        Confirma 
                    </button>
                </div>

                <br>
                <div id="itemsContainer" style="{{ isset($lista) ? 'display:block' : 'display:none' }};">
                    @if(isset($lista))
                        @for($i = 1; $i <= 10; $i++)
                            @php 
                                $campo = 'pos_' . str_pad($i, 2, '0', STR_PAD_LEFT); 
                                $valor = $lista->$campo;
                            @endphp
                            @if($valor)
                                <div id="item_{{ $i }}">
                                    <label for="item_{{ $i }}">{{ $i }}º Lugar:</label>
                                    <input type="text" id="item_{{ $i }}" name="item_{{ $i }}" value="{{ $valor }}">
                                </div>
                            @endif
                        @endfor
                    @endif
                </div>
                <br>
                <div style="display: flex; justify-content: center;">
                    <button 
                    type="button" 
                    id="addItemPosition" 
                    class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded"
                    style="display:none;"> Adiciona Item </button>
                </div>

                <br>
                <div style="display: flex; justify-content: center;">
                    <button 
                    type="submit" 
                    id="sendList" 
                    style="display:none;"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                    >Criar Lista!</button>
                    <button 
                    type="button" 
                    id="clearList" 
                    style="display:none;"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Limpar</button>
                </div>

            </form>
            <div>
                <a href="{{ route('listas.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"> Voltar </a>
            </div>
        </section>

    </div>

    

    <script>

        let position = {{ isset($lista) ? 10 : 0 }}; // Assuming if editing, we might have up to 10. Better logic could count non-nulls.
        // Simple fix: if editing, set position to count of non-null items to allow adding more if < 10.
        @if(isset($lista))
            @php
                $count = 0;
                for($i=1; $i<=10; $i++) {
                    $campo = 'pos_' . str_pad($i, 2, '0', STR_PAD_LEFT);
                    if($lista->$campo) $count = $i;
                }
            @endphp
            position = {{ $count }};
            
            // Show buttons if editing
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('addPositions').style.display = 'none';
                document.getElementById('addItemPosition').style.display = 'block';
                document.getElementById('sendList').style.display = 'block';
                document.getElementById('clearList').style.display = 'block';
            });
        @endif

        function insertPositions() {
            // ... existing code ...

            const buttonConfirmar = document.getElementById('addPositions');
            const divElementsList = document.getElementById('itemsContainer');
            const itemPosition = document.getElementById('addItemPosition');
            const sendList = document.getElementById('sendList');
            const clearList = document.getElementById('clearList');

            buttonConfirmar.style.display = 'none';

            addItem();

            divElementsList.style.display ='block';
            itemPosition.style.display ='block';
            sendList.style.display = 'block';
            clearList.style.display = 'block';

        }

        function addItem() {

            if (position >= 10) {
                document.getElementById('addItemPosition').style.display = 'none';
                return;
            }

            position++;

            const divElementsList = document.getElementById('itemsContainer');

            const itemDiv = document.createElement('div');
            itemDiv.id = `item_${position}`;

            const label = document.createElement('label');
            label.setAttribute('for', `item_${position}`);
            label.textContent = `${position}º Lugar:`;

            const input = document.createElement('input');
            input.type = 'text';
            input.id = `item_${position}`;
            input.name = `item_${position}`;

            itemDiv.appendChild(label);
            itemDiv.appendChild(input);
            divElementsList.appendChild(itemDiv);

        }

        function clearList() {
            document.getElementById('listName').value = '';

            const divElementsList = document.getElementById('itemsContainer');

            divElementsList.innerHTML = '';
            position = 0;

            addItem();
        }

        document.getElementById('addItemPosition').addEventListener('click', addItem);
        document.getElementById('clearList').addEventListener('click', clearList);

    </script>

@endsection
