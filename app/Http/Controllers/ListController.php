<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Rules\NomeUnicoPorUsuario;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listas = Lista::doUsuario()->get();
        return view('listas.index', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listas.cadastra_lista');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'listName' => ['required', new NomeUnicoPorUsuario()],
        ]);

        Lista::create(array_merge([
            'nome' => $request->listName,
            'usuario_id' => auth()->id(),
        ], $this->montarPosicoes($request)));

        return redirect()->route('listas.index')
            ->with('success', 'Lista criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lista $lista)
    {
        $this->authorize('update', $lista);
        return view('listas.cadastra_lista', compact('lista')); 
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lista $lista)
    {
        $this->authorize('update', $lista);

        $request->validate([
            'listName' => ['required', new NomeUnicoPorUsuario($lista->id)],
        ]);

        $lista->update(array_merge([
            'nome' => $request->listName,
        ], $this->montarPosicoes($request)));

        return redirect()->route('listas.index')
            ->with('success', 'Lista atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lista $lista)
    {
        $this->authorize('delete', $lista);
        $lista->delete();

        return redirect()->route('listas.index')
            ->with('success', 'Lista deletada com sucesso!');
    }

    /**
     * Monta os campos pos_01 ... pos_10
     */
    private function montarPosicoes(Request $request): array
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $key = 'pos_' . str_pad($i, 2, '0', STR_PAD_LEFT);
            $field = 'item_' . $i;

            $data[$key] = $request->input($field) ?: null;
        }

        return $data;
    }
}
