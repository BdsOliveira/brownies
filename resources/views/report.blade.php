@extends('layouts.layout')

@section('title', 'Relatórios')

@section('content')
    <div class="head">
        <p>Faturamento<br>Últimos 7 dias</p>
        <h1>R$&nbsp;<span id="cash"></span></h1>

    </div>

    <section class="content">
        <input type="date" id="beginDate">
        <input type="date" id="endDate">
        <input class="submit" type="button" onclick="printReport()" value="Consultar"></input>

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
