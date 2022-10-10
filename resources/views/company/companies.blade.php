@extends('layouts.layout')

@section('title', 'Gerenciar Empresas')

@section('content')
    <div class="head">
        <h1 class="">Empresas&nbsp;<span id="cash"></span></h1>

    </div>

    <section class="content">
        <div class="actions">
            <a href="sellers/create">
                <div class="iten-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar vendedor
                </div>
            </a>
            <a href="company/create">
                <div class="iten-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar Empresa
                </div>
            </a>
        </div>
        Exibir a lista de empresas com os botões de editar e excluir
    </section>

@endsection
