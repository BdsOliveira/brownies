<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sysbro</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/styles.css" type="text/css">

</head>

<body>
    <div class="title">
        <p>Faturamento<br>Últimos 30 dias</p>
        <h1 class="">R$&nbsp;<span id="cash"></span></h1>

    </div>

    <menu>
        <div class="icon-bar">
            <a class="active" href="/"><i class="fa fa-home"></i></a>
            <a href="/pages/form-create-sell.html"><i class="fa-solid fa-circle-plus"></i></a>
            <a href="/pages/report.html"><i class="fa-solid fa-chart-column"></i></a>
            <!-- <a href="#"><i class="fa fa-globe"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a> -->
        </div>
    </menu>

    <section class="content">
        <div class="actions">
            <a href="/pages/form-create-sell.html">
                <div class="iten-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar venda
                </div>
            </a>
            <a href="/pages/report.html">
                <div class="iten-action">
                    <i class="fa-solid fa-chart-column"></i>
                    Gerar Relatório
                </div>
            </a>
        </div>
    </section>
</body>

</html>
