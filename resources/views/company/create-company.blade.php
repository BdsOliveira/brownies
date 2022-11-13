@extends('layouts.layout')

@section('title', 'Cadastrar Empresa')

@section('content')
    <h2 class="">Cadastrar Empresa</h2>

    <section class="content">
        <div id="seller-create-container" class="col-md-6 offset-md-3">
            <form action="/management/company/create" method="POST">
                @csrf
                <div class="form-group">
                    <label for="companuName">Nome da empresa:</label>
                    <input type="text" name="companyName" id="companyName" class="form-control"
                        placeholder="Nome da empresa...">
                </div>
                <input type="submit" class="btn btn-primary" value="Cadastrar Empresa">
            </form>
        </div>
    </section>
@endsection
