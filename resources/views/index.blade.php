@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
    <section>
        <a href="/orders/create" class="btn-menus"><i class="fa fa-home"></i> Cadastrar venda</a>
        <a href="/report" class="btn-menus"><i class="fa fa-home"></i> Relatórios</a>
        <a href="/management" class="btn-menus"><i class="fa fa-home"></i> Gerenciar</a>
    </section>
@endsection
