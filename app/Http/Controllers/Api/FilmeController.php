<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmeResource;
use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index()
    {
        return FilmeResource::collection(Filme::all());
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'diretor' => 'required|string|max:255',
            'ano' => 'required|integer|min:1888|max:2100',
            'genero' => 'required|string|max:100',
            'nota' => 'nullable|numeric|min:0|max:10',
        ]);

        $filme = Filme::create($dados);

        return (new FilmeResource($filme))->response()->setStatusCode(201);
    }

    public function show(Filme $filme)
    {
        return new FilmeResource($filme);
    }

    public function update(Request $request, Filme $filme)
    {
        $dados = $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'diretor' => 'sometimes|required|string|max:255',
            'ano' => 'sometimes|required|integer|min:1888|max:2100',
            'genero' => 'sometimes|required|string|max:100',
            'nota' => 'nullable|numeric|min:0|max:10',
        ]);

        $filme->update($dados);

        return new FilmeResource($filme);
    }

    public function destroy(Filme $filme)
    {
        $filme->delete();

        return response()->noContent();
    }
}