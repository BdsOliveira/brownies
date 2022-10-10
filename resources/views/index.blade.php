@extends('layouts.layout')

@section('title', 'Início')

@section('content')
    <div class="head">
        <p>Faturamento<br>Últimos 30 dias</p>
        <h1 class="">R$&nbsp;<span id="cash"></span></h1>

    </div>

    <section class="content">
        <div class="actions">
            <a href="/create-sell">
                <div class="iten-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar venda
                </div>
            </a>
            <a href="report">
                <div class="iten-action">
                    <i class="fa-solid fa-chart-column"></i>
                    Gerar Relatório
                </div>
            </a>
            <a href="sellers">
                <div class="iten-action">
                    <i class="fa-solid fa-chart-column"></i>
                    Gerenciar Pessoas
                </div>
            </a>
        </div>
    </section>
@endsection
