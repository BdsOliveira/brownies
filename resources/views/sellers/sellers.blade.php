@extends('layouts.layout')

@section('title', 'Gerenciar Vendedores')

@section('content')
    <div class="head">
        <h1 class="">Vendedores&nbsp;<span id="cash"></span></h1>

    </div>

    <section class="content">
        <div class="actions">
            <a href="sellers/create">
                <div class="iten-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar vendedor
                </div>
            </a>
        </div>
        Exibir a lista de vendedores com os botões de editar e excluir
    </section>

@endsection
