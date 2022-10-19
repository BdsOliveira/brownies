@extends('layouts.layout')

@section('title', 'Editar Venda')

@section('content')
    <div class="head">
        <h1 class="">Editar venda</h1>
    </div>
    <section class="content">
        <form action="/order/update/{{ $order->id }}" method="POST" class="row">
            @csrf
            @method('PUT')
            <div class="col-md-2">
                <label for="id">Id da venda: {{ $order->id }}</label> <br>
                <input class="form-control" type="number" name="id" value="{{ $order->id }}" disabled>
            </div>
            <div class="col-md-5">
                <label for="id_seller">Nome do Vendedor:</label><br>
                <select class="form-control" name="id_seller" id="id_seller">
                    <option value="{{ $seller->id }}">{{ $seller->nameSeller }}</option>
                </select>
            </div>
            <div class="col-md-5">
                <label for="companySeller">Empresa do vendedor:</label><br>
                <select class="form-control" name="companySeller" id="companySeller">
                    <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                </select><br>
            </div>
            <div class="col-md-6">
                <label for="quantitySold">Quantidade vendida:</label><br>
                <input class="form-control" type="number" name="quantitySold" id="quantitySold"
                    value="{{ $order->quantitySold }}">
            </div>
            <div class="col-md-6">
                <label for="dateSell">Data da venda:</label><br>
                <input class="form-control" type="date" name="dateSell" id="dateSell" value="{{ $order->dateSell }}">
                <br>
            </div>
            <input class="submit btn btn-primary" type="submit" value="Editar">
        </form>
    </section>
@endsection
