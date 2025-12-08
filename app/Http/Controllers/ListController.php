<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listas = Lista::where('usuario_id', Auth::id())->get();
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
            'listName' => [
                'required',
                // Unicidade por usuário
                \Illuminate\Validation\Rule::unique('listas', 'nome')->where(function ($query) {
                    return $query->where('usuario_id', Auth::id());
                }),
            ],
        ], [
            'listName.unique' => 'Você já possui uma lista com este nome!',
            'listName.required' => 'O nome da lista é obrigatório.'
        ]);

        $input = $request->all();
        $userId = Auth::id();

        $listas = Lista::create([
            'nome' => $input['listName'],
            'pos_01' => $input['item_1'] ?? null,
            'pos_02' => $input['item_2'] ??  null,
            'pos_03' => $input['item_3'] ??  null,
            'pos_04' => $input['item_4'] ??  null,
            'pos_05' => $input['item_5'] ?? null,
            'pos_06' => $input['item_6'] ??  null,
            'pos_07' => $input['item_7'] ??  null,
            'pos_08' => $input['item_8'] ??  null,
            'pos_09' => $input['item_9'] ??  null,
            'pos_10' => $input['item_10'] ?? null,
            'usuario_id' => $userId 
        ]);

        return redirect()->route('listas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Garante que a lista pertence ao usuário logado
        $lista = Lista::where('usuario_id', Auth::id())->findOrFail($id);
        return view('listas.cadastra_lista', compact('lista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Garante que a lista pertence ao usuário logado antes de validar/atualizar
        $lista = Lista::where('usuario_id', Auth::id())->findOrFail($id);

        $request->validate([
            'listName' => [
                'required',
                // Unicidade por usuário, ignorando o ID atual
                \Illuminate\Validation\Rule::unique('listas', 'nome')->where(function ($query) {
                    return $query->where('usuario_id', Auth::id());
                })->ignore($id),
            ],
        ], [
            'listName.unique' => 'Você já possui uma lista com este nome!',
            'listName.required' => 'O nome da lista é obrigatório.'
        ]);

        $input = $request->all();

        $lista->update([
            'nome' => $input['listName'],
            'pos_01' => $input['item_1'] ?? null,
            'pos_02' => $input['item_2'] ??  null,
            'pos_03' => $input['item_3'] ??  null,
            'pos_04' => $input['item_4'] ??  null,
            'pos_05' => $input['item_5'] ?? null,
            'pos_06' => $input['item_6'] ??  null,
            'pos_07' => $input['item_7'] ??  null,
            'pos_08' => $input['item_8'] ??  null,
            'pos_09' => $input['item_9'] ??  null,
            'pos_10' => $input['item_10'] ?? null,
        ]);

        return redirect()->route('listas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Garante que a lista pertence ao usuário logado
        $lista = Lista::where('usuario_id', Auth::id())->findOrFail($id);
        $lista->delete();
        return redirect()->route('listas.index');
    }
}
