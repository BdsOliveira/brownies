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
            <table class="table table-hover table-sm">
                <thead>
                    <tr class="nav justify-content-center">
                        <th class="nav-item">
                            RELÁTÓRIO DOS ÚLTIMOS 7 DIAS - DETALHADO
                        </th>
                    </tr>
                    <tr>
                        <th spoce="row">Vendedor</th>
                        <th spoce="row">Total Vendido</th>
                        <th spoce="row">Data</th>
                        <th spoce="row">Comissão</th>
                        <th spoce="row">Ações</th>
                    </tr>
                </thead>
                <tbody>
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
                            <td>
                                <a class="btn btn-warning btn-sm" href="#"
                                    role="button">{{ $result->id }}Editar</a>
                                <a class="btn btn-danger btn-sm" href="#"
                                    role="button">{{ $result->id }}Excluir</a>
                            </td>
                        </tr>
                        <?php
                        $totalSells += $result->quantitySold * 5;
                        $totalComissions += $result->quantitySold;
                        ?>
                    @empty
                        <tr>
                            <td>Não há dados para o período selecionado.<br>Tente outra data.
                            </td>
                        </tr>
                    @endforelse
                    <tr>
                        <td>Total Vendido: R$ {{ $totalSells }}</td>
                        <td>Total de Comissões: R$ {{ $totalComissions }}</td>
                    </tr>
                    <tr>
                        <td>Total de Sistema: R$ {{ $totalComissions * 0.2 }}</td>
                        {{-- Gerar um pdf --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection
