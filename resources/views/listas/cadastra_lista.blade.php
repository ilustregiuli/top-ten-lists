@extends('home.master')

@section('title', 'Cadastre sua lista!')

@section('content')

    <style>
        .hidden { display: none; }
    </style>

    <div>
        <h1>Cadatro de nova lista</h1>

        <section class="form">
            <form id="createList" action="{{ route('lists.store') }}" method="post">
                @csrf

                <div>
                    <label for="listName">Nome da Lista: </label><br><br>
                    <input type="text" id="listName" name="listName" placeholder="Digite o nome da lista!" required>
                    <br><br>
                </div>

                <div>
                    <button type="button" id="addPositions" onclick="insertPositions()"> Confirma </button>
                </div>

                <br>
                <div id="itemsContainer" style="display:none;"></div>
                <br>
                <div style="display: flex; justify-content: center;">
                    <button type="button" id="addItemPosition" style="display:none;"> Adiciona Item </button>
                </div>

                <br>
                <div style="display: flex; justify-content: center;">
                    <button type="submit" id="sendList" style="display:none;">Criar Lista!</button>
                    <button type="button" id="clearList" style="display:none;">Limpar</button>
                </div>

            </form>
        </section>

    </div>

    <script>

        let position = 0;

        function insertPositions() {

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
