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
            <a href="company/create">
                <div class="iten-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar Empresa
                </div>
            </a>
        </div>
        <table>
            <thead>Vendedores Cadastradas</thead>
            <tbody>
                <tr>
                    <td>Nome do Vendedor</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($sellers as $seller)
                    <tr>
                        <td>
                            <p>{{ $seller->nameSeller }}</p>
                        </td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection
