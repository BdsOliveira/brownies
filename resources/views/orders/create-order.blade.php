@extends('layouts.layout')

@section('title', 'Registrar Vendas')

@section('content')
    <h2 class="">Registrar nova venda</h2>

    <section class="content">
        <form action="/order/create" method="POST" class="row">
            @csrf
            <div class="col-md-6">
                <label for="id_seller">Nome do Vendedor:</label>
                <select class="field form-control" name="id_seller" id="id_seller" required>
                    @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->nameSeller }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="companySeller">Empresa do vendedor:</label><br>
                <select class="field form-control" name="companySeller" id="companySeller" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->companyName }}">{{ $company->companyName }}</option>
                    @endforeach
                </select><br>
            </div>
            <div class="col-md-6">
                <label for="quantitySold">Quantidade vendida:</label><br>
                <input class="field form-control" type="number" name="quantitySold" id="quantitySold" required><br>
            </div>
            <div class="col-md-6">
                <label for="dateSell">Data da venda:</label><br>
                <input class="field form-control" type="date" name="dateSell" id="dateSell" required><br>
            </div>
            <input class="submit btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </section>
@endsection
