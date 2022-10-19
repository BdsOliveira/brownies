@extends('layouts.layout')

@section('title', 'Cadastrar Vendedor')

@section('content')
    <div class="head">
        <h1 class="">Cadastrar Vendedor&nbsp;<span id="cash"></span></h1>

    </div>

    <section class="content">
        <div class="actions">
        </div>
        <div id="seller-create-container" class="col-md-6 offset-md-3">
            <form action="/management/seller/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nameSeller">Vendedor:</label>
                    <input type="text" name="nameSeller" id="nameSeller" class="form-control"
                        placeholder="Nome do vendedor...">
                </div>
                <div class="form-group">
                    <label for="id_company">Empresa:</label>
                    <select name="id_company" id="id_company" class="form-control">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Cadastrar Vendedor">
            </form>
        </div>
    </section>

@endsection
