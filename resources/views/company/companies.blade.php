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
        <table>
            <thead>Empresas Cadastradas</thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>
                            <p>{{ $company->companyName }}</p>
                        </td>
                        <td>Editar Excluir</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>

@endsection
