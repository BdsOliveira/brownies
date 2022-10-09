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
                <option value=""></option>
                <option value="Ariely Barros">Ariely Barros</option>
                <option value="Brena Santos">Brena Santos</option>
                <option value="Bruno Oliveira">Bruno Oliveira</option>
                <option value="Cleiton Santos">Cleiton Santos</option>
                <option value="Diana">Diana</option>
                <option value="Itamara">Itamara</option>
                <option value="Jailson">Jailson</option>
                <option value="Josirene Cruz">Josirene Cruz</option>
                <option value="Pauliana Santos">Pauliana Santos</option>
                <option value="Thaismara">Thaismara</option>
            </select><br>

            <label for="companySeller">Empresa do vendedor:</label><br>
            <select class="field" name="companySeller" id="companySeller">
                <option value=""></option>
                <option value="Estacao Grill">Estação Grill</option>
                <option value="Patroni Pizzaria">Patroni Pizzaria</option>
            </select><br>
            <label for="quantitySold">Quantidade vendida:</label><br>
            <input class="field" type="number" name="quantitySold" id="quantitySold"><br>
            <label for="sellDate">Data da venda:</label><br>
            <input class="field" type="date" name="sellDate" id="sellDate"><br>

            <input class="submit" type="button" onclick="resquest()" value="Cadastrar"></input>
        </form>
    </section>
@endsection
