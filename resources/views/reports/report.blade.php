@extends('layouts.layout')

@section('title', 'Relatórios')

@section('content')
    <div class="head">
        <p>Faturamento<br>Últimos 7 dias</p>
        <h1>R$&nbsp;<span id="cash">{{ $payload['faturamento'] }},00</span></h1>

    </div>

    <section class="content">
        <form action="/" method="POST">
            <input type="date" id="beginDate" name="beginDate">
            <input type="date" id="endDate" name="endDate">
            <input class="submit" type="submit" value="Consultar">
        </form>

        <div class="report" id="iReport">
            <table id="iTable">
                <thead>
                    <tr>
                        <th>Vendedor</th>
                        <th>Vendas</th>
                        <th>Comissão</th>
                    </tr>
                </thead>
                <tbody id="tableBody">

                </tbody>
            </table>
        </div>
    </section>

@endsection
