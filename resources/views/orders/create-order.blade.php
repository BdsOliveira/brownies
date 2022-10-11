@extends('layouts.layout')

@section('title', 'Registrar Vendas')

@section('content')
    <div class="head">
        <p>Faturamento<br>Últimos 30 dias</p>
        <h1 class="">R$&nbsp;<span id="cash"></span></h1>

    </div>
    <section class="content">
        <form id="formCreateSell" method="POST">
            <label for="nameSeller">Nome do Vendedor:</label><br>
            <select class="field" name="nameSeller" id="nameSeller">
                @foreach ($sellers as $seller)
                    <option value="{{ $seller->nameSeller }}">{{ $seller->nameSeller }}</option>
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
            <label for="sellDate">Data da venda:</label><br>
            <input class="field" type="date" name="sellDate" id="sellDate"><br>

            <input class="submit" type="submit" value="Cadastrar">
        </form>
    </section>
@endsection
