@extends('layouts.layout')

@section('title', 'Cadastrar Vendedor')

@section('content')
    <h2 class="">Cadastrar Vendedor</h2>
    <form action="/management/seller/create" method="POST" class="row">
        @csrf
        <div class="form-group col-md-6">
            <label for="nameSeller" class="form-label">Vendedor:</label>
            <input type="text" name="nameSeller" id="nameSeller" class="form-control" placeholder="Nome do vendedor..."
                required>
        </div>
        <div class="form-group col-md-6">
            <label for="id_company">Empresa:</label>
            <select name="id_company" id="id_company" class="form-control" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary m-3" value="Cadastrar Vendedor">
    </form>
@endsection
