@extends('layouts.layout')

@section('title', 'Editar Vendedor')

@section('content')
    <h2 class="">Editar Vendedor</h2>
    <form action="/management/seller/update/{{ $seller->id }}" method="POST" class="row">
        @csrf
        @method('PUT')

        <input type="number" name="id" value="{{ $seller->id }}" class="d-none"> <br>

        <div class="form-group col-md-6">
            <label for="nameSeller" class="form-label">Nome do vendedor:</label><br>
            <input class="form-control" type="text" name="nameSeller" id="nameSeller" value="{{ $seller->nameSeller }}"
                required>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="companySeller">Empresa do vendedor:</label><br>
            <select class="form-control" name="companySeller" id="companySeller" required>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @if ($company->id === $seller->id_company) selected="selected"; @endif>
                        {{ $company->companyName }}
                    </option>
                @endforeach
            </select>
        </div>
        <input class="submit btn btn-primary m-3" type="submit" value="Editar">
    </form>
@endsection
