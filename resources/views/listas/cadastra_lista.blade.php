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
                    <input type="text" id="listName" name="nameList" placeholder="Digite o nome da lista!" required>
                    <br><br>
                </div>

                <div>
                    <button type="button" id="addPositions"> Adicionar posições</button>
                </div>


                <div id="itemsContainer" style="display:none;">
                    <br>
                </div>

                <br>
                <button type="submit" id="sendList" style="display:none;">Criar Lista!</button>
            </form>
        </section>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let itemCount = 1;
            const maxItems = 10;
            const addPositions = document.getElementById('addPositions');
            const itemsContainer = document.getElementById('itemsContainer');

            function createItemForm(itemNumber) {
                const itemDiv = document.createElement('div');
                itemDiv.id  = `item${itemNumber}`;

                const label = document.createElement('label');
                label.setAttribute('for',`${itemNumber}º Lugar`);
                label.textContent = `${itemNumber}º Lugar: `;

                const input = document.createElement('input');
                input.type = 'text';
                input.id = `item${itemNumber}`;
                input.name = `item${itemNumber}`;

                const confirmItem = document.createElement('button');
                confirmItem.type = 'button';
                confirmItem.textContent = 'Confirmar Item';

                confirmItem.addEventListener('click', function() {
                    const itemValue = input.value.trim();
                    if (itemValue) {
                        itemDiv.style.display = 'none';
                        if (itemNumber < maxItems) {
                            createItemForm(itemNumber + 1);
                        } else {
                            salvarlist.style.display = 'block';
                        }

                    } else {
                        alert('Campo vazio! Preencha antes.');
                    }
                });

                itemDiv.appendChild(label);
                itemDiv.appendChild(input);
                itemDiv.appendChild(confirmItem);

                itemsContainer.appendChild(itemDiv);

            }

            document.addEventListener('click', function() {
                itemsContainer.style.display = 'block';
            });

            createItemForm(itemCount);

        });

    </script>


@endsection
