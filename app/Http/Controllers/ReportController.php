<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Services\Order\Reports;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use PDF;

class ReportController extends Controller
{

    public function index()
    {
        $invoice = ReportController::invoicing(now()->subDay(30), now());
        return view('/index', ['payload' => $invoice]);
    }

    public function report()
    {
        $invoice = ReportController::invoicing(now()->subDay(7), now());
        return view('/reports/report', ['payload' => $invoice]);
    }


    public function invoicing($beginDate, $endDate)
    {
        $orders = (new Reports)->reportFromDays($beginDate, $endDate);
        $faturamento = (new Reports)->faturamento($orders);
        $resume = ReportController::resumeInvoicing($beginDate, $endDate);

        $payload = [
            'orders' => $orders,
            'faturamento' => $faturamento,
            'resume' => $resume
        ];
        return $payload;
    }

    public function resumeInvoicing($beginDate, $endDate)
    {
        $orders = (new Reports)->reportFromDays($beginDate, $endDate);
        $sellers = Seller::all();
        $nameSellers = [];
        foreach ($sellers as $seller) {
            $nameSellers = Arr::add($nameSellers, 'nameSeller', $seller->nameSeller);
        }
        // dd($sellers);
        // Arr::exists($sellers, 2);
        // return 0;
    }

    public function pdfReport(Request $request)
    {
        // $beginDate = $request->beginDate;
        // $beginDate = Carbon::createFromFormat('Y-m-d', $beginDate);
        // $endDate = $request->endDate;
        // $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        // $payload = ReportController::invoicing($beginDate, $endDate);
        $pdf = PDF::loadHTML('');
        // return view('turmas.notasajustadas', ['serie' => $serie, 'disciplina' => $disciplina, 'turma' => $turma, 'alunos' => $alunos, 'escola' => $escola, 'bimestre' => $bimestre]);
        // }
        // $pdf->setOption('orientation', 'landscape');
        // $pdf->setOption('header-html', App::make('_.url') . '/relatorio/header/' . $escola->id);
        // $pdf->setOption('footer-html', App::make('_.url') . '/relatorio/footer-paginacao');
        $pdf->loadView('reports.test');
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

    public function reportFromDate(Request $request)
    {
        $beginDate = $request->beginDate;
        $beginDate = Carbon::createFromFormat('Y-m-d', $beginDate);
        $endDate = $request->endDate;
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        $payload = ReportController::invoicing($beginDate, $endDate);

        return view('/reports/report', ['payload' => $payload]);
    }
}
