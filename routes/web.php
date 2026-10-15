<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CotacaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cotacoes', [CotacaoController::class, 'index']);