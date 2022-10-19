@extends('layouts.layout')

@section('title', 'Gerenciar Vendedores')

@section('content')
    <div class="head">
        <h1 class="">Vendedores&nbsp;<span id="cash"></span></h1>
    </div>

    <a href="/management/seller/create">Cadastrar novo vendedor </a>
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
                @foreach ($sellers as $seller)
                    <tr>
                        <td>
                            {{ $seller->nameSeller }}
                        </td>
                        <td>
                            <a class="btn btn-info edit-btn btn-sm" href="/management/seller/edit/{{ $seller->id }}"
                                role="button">
                                Editar
                            </a>
                            <form action="/management/seller/{{ $seller->id }}" method="POST">
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
