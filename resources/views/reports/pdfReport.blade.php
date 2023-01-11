<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path() }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <table class="table table-sm">
        <thead>
            <tr class="justify-content-center">
                <th colspan="2">
                    RELATÓRIO DO PERÍODO - RESUMIDO
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    Período: {{ $payload['beginDate']->format('d/m/Y') }}
                    até {{ $payload['endDate']->format('d/m/Y') }}
                </th>
            </tr>
            <tr>
                <th scope="row">Vendedor</th>
                <th scope="row">Comissão</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalSells = 0;
            $totalComissions = 0; ?>
            @forelse ($payload['ordersGroups'] as $result)
                <tr>
                    {{-- {{ dd($result) }} --}}
                    <td>{{ $result->first() ? $result->first()->seller->nameSeller : '- - -' }}</td>

                    <?php $comission = $result->reduce(function ($acumulado, $item) {
                        return $acumulado + $item->quantitySold;
                    }, 0); ?>
                    <td>R$ {{ $comission }}</td>
                    <?php
                    $totalComissions += $comission;
                    ?>
                </tr>
            @empty
                <tr>
                    <td>Não há dados para o período selecionado.<br>Tente outra data.
                    </td>
                </tr>
            @endforelse
            <tr scope="row">
                <td colspan="2">Total de Comissões: R$ {{ $totalComissions }}</td>
            </tr>
            <tr>
                <td>Total Vendido: R$ {{ $totalComissions * 5 }}</td>
                <td colspan="2">Total de comissão do sistema: R$ {{ $totalComissions * 0.2 }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <hr>
    <table class="table table-hover table-sm">
        <tbody>
            <tr class="nav justify-content-center">
                <th colspan="4">
                    RELÁTÓRIO DO PERÍODO - DETALHADO
                </th>
            </tr>
            <tr>
                <th spoce="row">Vendedor</th>
                <th spoce="row">Total Vendido</th>
                <th spoce="row">Data</th>
                <th spoce="row">Comissão</th>
            </tr>
            {{-- <?php
            $totalSells = 0;
            $totalComissions = 0;
            ?> --}}
            @forelse ($payload['orders'] as $result)
                <tr>
                    <td> {{ $result->seller->nameSeller ?? '----' }} </td>
                    <td> R$ {{ $result->quantitySold * 5 }},00 </td>
                    <td> {{ $result->dateSell }} </td>
                    <td> R$ {{ $result->quantitySold }},00 </td>
                </tr>
                {{-- <?php
                $totalSells += $result->quantitySold * 5;
                $totalComissions += $result->quantitySold;
                ?> --}}
            @empty
                <tr>
                    <td>Não há dados para o período selecionado.<br>Tente outra data.
                    </td>
                </tr>
            @endforelse
            <tr>
                <td colspan="2">Total Vendido: R$ {{ $totalComissions * 5 }}</td>
                <td colspan="2">Total de Comissões: R$ {{ $totalComissions }}</td>
            </tr>
            <tr>
                <td colspan="5">Total de Sistema: R$ {{ $totalComissions * 0.2 }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
