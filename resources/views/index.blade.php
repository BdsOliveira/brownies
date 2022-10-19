@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="head">
        <h1 class="">Vendedores&nbsp;<span id="cash"></span></h1>

    </div>
    <section>
        <a href="/orders/create" class="btn-menus"><i class="fa fa-home"></i> Cadastrar venda</a>
        <a href="/report" class="btn-menus"><i class="fa fa-home"></i> Relatórios</a>
        <a href="/management" class="btn-menus"><i class="fa fa-home"></i> Gerenciar</a>

    </section>

@endsection
