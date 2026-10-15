<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cotações</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 40px auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        .up { color: green; } .down { color: red; }
    </style>
</head>
<body>
    <h1>Cotações em tempo real</h1>

    @if (empty($cotacoes))
        <p>Não foi possível carregar as cotações.</p>
    @else
        <table>
            <tr>
                <th>Moeda</th><th>Compra</th><th>Venda</th><th>Variação</th><th>Atualizado</th>
            </tr>
            @foreach ($cotacoes as $c)
                <tr>
                    <td>{{ $c['name'] }}</td>
                    <td>R$ {{ number_format($c['bid'], 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($c['ask'], 2, ',', '.') }}</td>
                    <td class="{{ $c['pctChange'] >= 0 ? 'up' : 'down' }}">{{ $c['pctChange'] }}%</td>
                    <td>{{ $c['create_date'] }}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>