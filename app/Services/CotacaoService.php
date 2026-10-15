<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CotacaoService
{
    private string $baseUrl = 'https://economia.awesomeapi.com.br/json';

    public function obterCotacoes(array $moedas = ['USD-BRL', 'EUR-BRL', 'BTC-BRL']): array
    {
        $response = Http::withoutVerifying()
            ->timeout(10)
            ->get($this->baseUrl . '/last/' . implode(',', $moedas));

        if ($response->failed()) {
            return [];
        }

        return array_values($response->json());
    }
}
