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
        return ReportController::invoicing(now()->subDay(30), now());
    }
    // public function viewIindex()
    // {
    //     $invoice = ReportController::invoicing(now()->subDay(30), now());
    //     return view('/index', ['payload' => $invoice]);
    // }

    // public function viewReport()
    // {
    //     $invoice = ReportController::invoicing(now()->subDay(7), now());
    //     return view('/reports/report', ['payload' => $invoice]);
    // }


    public function invoicing($beginDate, $endDate)
    {
        $orders = (new Reports)->reportFromDays($beginDate, $endDate);
        $billing = (new Reports)->billing($orders);

        $ordersBySeller = $orders->groupBy('seller_id');
        $ordersByProduct = $orders->groupBy('product_id');
        $ordersByDate = $orders->groupBy('date');

        $payload = [
            'orders' => $orders,
            'ordersBySeller' => $ordersBySeller,
            'ordersByProduct' => $ordersByProduct,
            'ordersByDate' => $ordersByDate,
            'billing' => $billing,
            'beginDate' => $beginDate,
            'endDate' => $endDate,
        ];
        return $payload;
    }

    public function pdfReport(Request $request)
    {
        $payload = ReportController::reportFromDate($request->beginDate, $request->endDate);
        $pdf = PDF::loadHTML('');
        $pdf->loadView('reports.pdfReport', ['payload' => $payload]);

        $pdf->setOption('header-html', '<h1>Título</h1>'); // . '/relatorio/header/' . $escola->id);
        $pdf->setOption('footer-html', '<h3>Sysbro &copy; 2022</h3>'); // . '/relatorio/footer-paginacao');

        $pdf->setOption('javascript-delay', 2000);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('header-spacing', 20);
        $pdf->setOption('margin-top', 20);
        $pdf->setOption('margin-left', 25);
        $pdf->setOption('margin-right', 25);
        $pdf->setOption('title', 'RELATÓRIO');
        return $pdf->stream();
    }

    // public function viewReportFromDate(Request $request)
    // {
    //     $payload = ReportController::reportFromDate($request->beginDate, $request->endDate);
    //     return view('/reports/report', ['payload' => $payload]);
    // }

    // public function reportFromDate($beginDate, $endDate)
    // {
    //     $beginDate = Carbon::createFromFormat('Y-m-d', $beginDate);
    //     $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

    //     $payload = ReportController::invoicing($beginDate, $endDate);
    //     return $payload;
    // }
}
