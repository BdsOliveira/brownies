<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- CSS Bootstrap da Aplicação -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">

    {{-- Install VueJS --}}
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <link rel="stylesheet" href="/css/styles.css" type="text/css">

</head>

<body>
    <div id="full-page">

        <div id="top">
            <div class="container-fluid bg-dark text-light">
                <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                    <a href="/"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-light text-decoration-none keychainify-checked">
                        <svg class="bi me-2" width="40" height="32"></svg>
                        <span class="fs-4">Início</span>
                    </a>
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="/orders/create"
                                class="nav-link keychainify-checked text-light ">Cadastrar
                                Venda</a>
                        </li>
                        <li class="nav-item"><a href="/report"
                                class="nav-link keychainify-checked text-light ">Relatórios</a>
                        </li>
                        <li class="nav-item"><a href="/management"
                                class="nav-link keychainify-checked text-light ">Gerenciar</a></li>
                        <li class="nav-item"><a href="/user/profile" class="nav-link keychainify-checked text-light ">Minha
                                conta</a>
                        </li>
                    </ul>
                </header>
            </div>
        </div>

        <div id="content">
            @if (session('msg'))
                <div class="alert alert-success">
                    <p>{{ session('msg') }}</p>
                </div>
            @endif
            <div class="container">
                @yield('content')
            </div>
        </div>

        <div id="footer">
            <footer class="container-fluid bg-dark text-light text-center py-3 mt-5">
                <script>
                    document.write(new Date().getFullYear());
                </script> &copy; SYSBRO - Todos os direitos reservados
            </footer>
        </div>

    </div>
</body>

</html>
