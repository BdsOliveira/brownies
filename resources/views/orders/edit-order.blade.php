@extends('layouts.layout')

@section('title', 'Editar Venda')

@section('content')
    <div class="head">
        <h1 class="">Editar venda</h1>
    </div>
    <section class="content">
        <form action="/order/update/{{ $order->id }}" method="POST">
            @csrf
            @method('PUT')
            <label for="id">Id da venda: {{ $order->id }}</label> <br>
            <input type="number" name="id" value="{{ $order->id }}" disabled> <br>
            <label for="id_seller">Nome do Vendedor:</label><br>
            <select class="field" name="id_seller" id="id_seller">
                <option value="{{ $seller->id }}">{{ $seller->nameSeller }}</option>
            </select><br>

            <label for="companySeller">Empresa do vendedor:</label><br>
            <select class="field" name="companySeller" id="companySeller">
                <option value="{{ $company->id }}">{{ $company->companyName }}</option>
            </select><br>
            <label for="quantitySold">Quantidade vendida:</label><br>
            <input class="field" type="number" name="quantitySold" id="quantitySold"
                value="{{ $order->quantitySold }}"><br>
            <label for="dateSell">Data da venda:</label><br>
            <input class="field" type="date" name="dateSell" id="dateSell" value="{{ $order->dateSell }}"><br>

            <input class="submit" type="submit" value="Editar">
        </form>
    </section>
@endsection
