@extends('layouts.layout')

@section('title', 'Editar Empresa')

@section('content')
    <h2 class="">Editar Empresa</h2>
    <form action="/management/company/update/{{ $company->id }}" method="POST" class="row">
        @csrf
        @method('PUT')
        <input type="number" name="id" value="{{ $company->id }}" class="d-none"> <br>
        <div class="form-group">
            <label for="companyName" class="form-label">Nome da empresa:</label><br>
            <input class="form-control" type="text" name="companyName" id="companyName"
                value="{{ $company->companyName }}" required>
        </div>
        <input class="submit btn btn-primary m-3" type="submit" value="Editar">
    </form>
@endsection
