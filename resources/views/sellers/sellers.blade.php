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
            <thead align="center">Vendedores Cadastradas</thead>
            <tbody>
                <tr>
                    <td align="center" colspan="2">Nome do Vendedor</td>
                </tr>
                @foreach ($sellers as $seller)
                    <tr>
                        <td align="right">
                            {{ $seller->nameSeller }}
                        </td>
                        <td>Editar Exluir</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection
