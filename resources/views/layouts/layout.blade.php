<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/styles.css" type="text/css">

</head>

<body>
    <menu>
        <div class="icon-bar">
            <a class="active" href="/"><i class="fa fa-home"></i></a>
            <a href="/create-sell"><i class="fa-solid fa-circle-plus"></i></a>
            <a href="report"><i class="fa-solid fa-chart-column"></i></a>
        </div>
    </menu>
    @yield('content')
</body>

</html>
