@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="head">
        <h1 class="">Vendedores&nbsp;<span id="cash"></span></h1>

    </div>
    <section class="content">
        <div class="actions">
            <a href="/order">
                <div class="iten-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar venda
                </div>
            </a>
            <a href="/report">
                <div class="iten-action">
                    <i class="fa-solid fa-chart-column"></i>
                    Gerar Relatório
                </div>
            </a>
            <a href="/management">
                <div class="iten-action">
                    <i class="fa-solid fa-chart-column"></i>
                    Gerenciar
                </div>
            </a>
        </div>
    </section>

@endsection
