@extends('layouts.layout')

@section('title', 'Relatórios')

@section('content')
    <div class="head row bg-dark p-3 text-light rounded-pill opacity-75">
        <div class="col-md-2">Faturamento<br>Últimos 7 dias</div>
        <h2 class="col-md-1">R$&nbsp;<span id="cash">{{ $payload['faturamento'] }},00</span></h2>
    </div> <br>

    <section class="content">
        <form action="/report" method="POST" class="row ms-5">
            @csrf
            <div class="col-md-4">
                <label for="beginDate" class="form-label">Data inicial: </label>
                <input type="date" class="form-control form-control-lg" id="beginDate" name="beginDate" required>
            </div>
            <div class="col-md-4">
                <label for="endDate" class="form-label">Data final: </label>
                <input type="date" class="form-control form-control-lg" id="endDate" name="endDate" required>
            </div>
            <div class="col-md-4">
                <div class="form-label"> &nbsp; </div>
                <input class="submit btn btn-primary btn-lg" type="submit" value="Consultar">
                <input class="submit btn btn-primary btn-lg" type="submit" formaction="/pdfReport" value="Gerar PDF">
            </div>
        </form> <br>

        <div class="result-table" id="iReport">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th colspan="5">
                            RELÁTÓRIO DO PERÍODO - DETALHADO
                        </th>
                    </tr>
                    <tr>
                        <th spoce="row">Vendedor</th>
                        <th spoce="row">Total Vendido</th>
                        <th spoce="row">Data</th>
                        <th spoce="row">Comissão</th>
                        <th spoce="row">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalSells = 0;
                    $totalComissions = 0;
                    ?>
                    @forelse ($payload['orders'] as $result)
                        <tr>
                            <td> {{ $result->seller->nameSeller ?? '----' }} </td>
                            <td> R$ {{ $result->quantitySold * 5 }},00 </td>
                            <td> {{ $result->dateSell }} </td>
                            <td> R$ {{ $result->quantitySold }},00 </td>
                            <td>
                                <a class="btn btn-info edit-btn btn-sm" href="/order/edit/{{ $result->id }}"
                                    role="button">
                                    Editar
                                </a>
                                <form action="/order/{{ $result->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $totalSells += $result->quantitySold * 5;
                        $totalComissions += $result->quantitySold;
                        ?>
                    @empty
                        <tr>
                            <td>Não há dados para o período selecionado.<br>Tente outra data.
                            </td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="2">Total Vendido: R$ {{ $totalSells }}</td>
                        <td colspan="3">Total de Comissões: R$ {{ $totalComissions }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">Total de Sistema: R$ {{ $totalComissions * 0.2 }}</td>
                        {{-- Gerar um pdf --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

@endsection
