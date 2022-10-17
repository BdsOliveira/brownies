<?php

namespace App\Services\Pdf;

use App\Models\Order;
use Carbon\CarbonInterface;
use DB;
use Illuminate\Database\Eloquent\Collection;

class Pdf
{
    public function generate($payload)
    {
        $pdf = PDF::loadHtml('<h1> simple HTML test.</h1>');
        $html = '<table class="table table-hover table-sm">
        <thead>
            <tr class="nav justify-content-center">
                <th class="nav-item col-12">
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
            @forelse ($payload["orders"] as $result)
                <tr>
                    <td> {{ $result->seller->nameSeller }} </td>
                    <td> R$ {{ $result->quantitySold * 5 }},00 </td>
                    <td> {{ $result->dateSell }} </td>
                    <td> R$ {{ $result->quantitySold }},00 </td>
                </tr>
                <?php
                $totalSells += $result->quantitySold * 5;
                $totalComissions += $result->quantitySold;
                ?>
            @empty';
        $pdf->generateFromHtml($html, 'report.pdf');
        $pdf->inline();
    }
}
