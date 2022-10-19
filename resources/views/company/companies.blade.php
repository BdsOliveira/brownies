@extends('layouts.layout')

@section('title', 'Gerenciar Empresas')

@section('content')
    <div class="head">
        <h1 class="">Empresas&nbsp;<span id="cash"></span></h1>

    </div>

    <section class="content result-table">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th colspan="2">
                        Vendedores Cadastrados
                    </th>
                </tr>
                <tr>
                    <th scope="row">Nome do Vendedor</td>
                    <th scope="row">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>
                            {{ $company->companyName }}
                        </td>
                        <td>
                            <a class="btn btn-info edit-btn btn-sm" href="/company/edit/{{ $company->id }}" role="button">
                                Editar
                            </a>
                            <form action="/company/{{ $company->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>

@endsection
