<?php

namespace App\Http\Controllers;

use App\Services\CotacaoService;

class CotacaoController extends Controller
{
    public function index(CotacaoService $service)
    {
        $cotacoes = $service->obterCotacoes();

        return view('cotacoes', compact('cotacoes'));
    }
}