<?php

namespace App\Services\Pdf;

use App\Models\Order;
use Carbon\CarbonInterface;
use DB;
use Illuminate\Database\Eloquent\Collection;
use PDF;

class Pdf
{
    // public function config($pdf)
    // {
    //     $pdf->setOption('javascript-delay', 2000);
    //     $pdf->setOption('enable-javascript', true);
    //     $pdf->setOption('no-stop-slow-scripts', true);
    //     $pdf->setOption('header-spacing', 2);
    //     $pdf->setOption('margin-top', 55);
    //     $pdf->setOption('margin-left', 5);
    //     $pdf->setOption('margin-right', 5);
    //     return $pdf;
    // }

    public function generate($payload)
    {
        $pdf = PDF::loadHTML('');
        $pdf->loadView('reports.pdfReport', ['payload' => $payload]);
        $pdf->setOption('javascript-delay', 2000);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('header-spacing', 2);
        $pdf->setOption('margin-top', 55);
        $pdf->setOption('margin-left', 5);
        $pdf->setOption('margin-right', 5);
        // $pdf->setOption('title', 'RELATÓRIO');
        return $pdf->stream();
    }
}
