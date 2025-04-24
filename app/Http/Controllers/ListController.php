<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listas = Lista::all();
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
        $input = $request->all();

        $lista = Lista::create([
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
            'usuario_id' => 1
        ]);

        return view('listas.lista_criada', compact('lista'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
