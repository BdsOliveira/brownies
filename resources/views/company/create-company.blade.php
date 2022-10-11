@extends('layouts.layout')

@section('title', 'Cadastrar Empresa')

@section('content')
    <div class="head">
        <h1 class="">Cadastrar Empresa&nbsp;<span id="cash"></span></h1>

    </div>

    <section class="content">
        <div id="seller-create-container" class="col-md-6 offset-md-3">
            <form action="/company" method="POST">
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
