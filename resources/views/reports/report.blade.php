@extends('layouts.layout')

@section('title', 'Relatórios')

@section('content')
    <div class="head">
        <p>Faturamento<br>Últimos 7 dias</p>
        <h1>R$&nbsp;<span id="cash">{{ $payload['faturamento'] }},00</span></h1>

    </div>

    <section class="content">
        <form action="/report" method="POST">
            @csrf
            <input type="date" id="beginDate" name="beginDate">
            <input type="date" id="endDate" name="endDate">
            <input class="submit" type="submit" value="Consultar">
        </form>

        <div class="report" id="iReport">
            <table id="iTable">
                <thead>
                    <tr>
                        <td colspan="4">
                            Relatório dos ultimos 7 dias
                        </td>
                    </tr>
                    <tr>
                        <th>Vendedor</th>
                        <th>Total Vendido</th>
                        <th>Data</th>
                        <th>Comissão</th>
                        <th align="center">Ações</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    $totalSells = 0;
                    $totalComissions = 0;
                    ?>
                    @forelse ($payload['orders'] as $result)
                        <tr>
                            <td> {{ $result->seller->nameSeller ?? '----' }} </td>
                            <td> R$ {{ $result->quantitySold * 5 }},00 </td>
                            <td> {{ $result->dateSell }} </td>
                            <td> R$ {{ $result->quantitySold }},00 </td>
                            <td> Editar Excluir</td>
                        </tr>
                        <?php
                        $totalSells += $result->quantitySold * 5;
                        $totalComissions += $result->quantitySold;
                        ?>
                    @empty
                        <tr>
                            <td colspan="5" align="center">Não há dados para o período selecionado.<br>Tente outra data.
                            </td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="2" align="center">Total Vendido: R$ {{ $totalSells }}</td>
                        <td colspan="2" align="center">Total de Comissões: R$ {{ $totalComissions }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection
