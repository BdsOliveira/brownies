@extends('layouts.layout')

@section('title', 'Editar Vendedor')

@section('content')
    <div class="head">
        <h1 class="">Editar Vendedor</h1>
    </div>
    <section class="content">
        <form action="/management/seller/update/{{ $seller->id }}" method="POST">
            @csrf
            @method('PUT')

            <input type="number" name="id" value="{{ $seller->id }}" class="d-none"> <br>

            <label for="nameSeller">Nome do vendedor:</label><br>
            <input type="text" name="nameSeller" id="nameSeller" value="{{ $seller->nameSeller }}"><br>

            <label for="companySeller">Empresa do vendedor:</label><br>
            <select class="field" name="companySeller" id="companySeller">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @if ($company->id === $seller->id_company) selected="selected"; @endif>
                        {{ $company->companyName }}
                    </option>
                @endforeach
            </select><br>

            <input class="submit" type="submit" value="Editar">
        </form>
    </section>
@endsection
