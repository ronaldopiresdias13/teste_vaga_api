<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eletrodomestico;
use Illuminate\Http\Request;

class EletrodomesticoController extends Controller
{
    public function index()
    {
        return Eletrodomestico::all();
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'tensao' => 'required|string',
            'marca' => 'required|in:Electrolux,Brastemp,Fischer,Samsung,LG',
        ]);

        return Eletrodomestico::create($validatedData);
    }

    public function show($id)
    {
        return Eletrodomestico::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $eletrodomestico = Eletrodomestico::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'tensao' => 'required|string',
            'marca' => 'required|in:Electrolux,Brastemp,Fischer,Samsung,LG',
        ]);

        $eletrodomestico->update($validatedData);

        return $eletrodomestico;
    }

    public function destroy($id)
    {
        $eletrodomestico = Eletrodomestico::findOrFail($id);
        $eletrodomestico->delete();

        return response()->json(['message' => 'Registro removido com sucesso']);
    }
}
