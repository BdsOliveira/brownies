@extends('layouts.layout')

@section('title', 'Registrar Vendas')

@section('content')
    <div class="head">
        <h1 class="">Registrar nova venda</h1>

    </div>
    <section class="content">
        <form id="formCreateSell" method="POST">
            @csrf
            <label for="id_seller">Nome do Vendedor:</label><br>
            <select class="field" name="id_seller" id="id_seller">
                @foreach ($sellers as $seller)
                    <option value="{{ $seller->id }}">{{ $seller->nameSeller }}</option>
                @endforeach
            </select><br>

            <label for="companySeller">Empresa do vendedor:</label><br>
            <select class="field" name="companySeller" id="companySeller">
                @foreach ($companies as $company)
                    <option value="{{ $company->companyName }}">{{ $company->companyName }}</option>
                @endforeach
            </select><br>
            <label for="quantitySold">Quantidade vendida:</label><br>
            <input class="field" type="number" name="quantitySold" id="quantitySold"><br>
            <label for="dateSell">Data da venda:</label><br>
            <input class="field" type="date" name="dateSell" id="dateSell"><br>

            <input class="submit" type="submit" value="Cadastrar">
        </form>
    </section>
@endsection
