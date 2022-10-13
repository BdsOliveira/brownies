@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="head">
        <h1 class="">Vendedores&nbsp;<span id="cash"></span></h1>

    </div>
    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="card-counter danger">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <span class="count-numbers">599</span>
                        <span class="count-name">Mês</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter success">
                        <i class="fa fa-database"></i>
                        <span class="count-numbers">6875</span>
                        <span class="count-name">Semana</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa fa-users"></i>
                        <span class="count-numbers">35</span>
                        <span class="count-name">Comissões Vendedores</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-counter info">
                        <i class="fa-sharp fa-solid fa-comments-dollar"></i>
                        <span class="count-numbers">35</span>
                        <span class="count-name">Comissão Sistema</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="actions">
            <a href="/create-order">
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
