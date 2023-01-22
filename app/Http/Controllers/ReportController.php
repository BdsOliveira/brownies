<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        return ReportController::invoicing(Order::latest()->get());
    }

    public static function invoicing($orders)
    {
        $billing = (new Reports)->billing($orders);

        $ordersBySeller = $orders->groupBy('seller.name');
        $ordersByProduct = $orders->groupBy('product.name');
        $ordersByDate = $orders->groupBy('date');

        $payload = [
            'orders' => $orders,
            'ordersBySeller' => $ordersBySeller,
            'ordersByProduct' => $ordersByProduct,
            'ordersByDate' => $ordersByDate,
            'billing' => $billing,
            'beginDate' => $orders[0]->date,
            'endDate' => $orders[count($orders)-1]->date,
        ];
        return $payload;
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

    // public function pdfReport(Request $request)
    // {
    //     $payload = ReportController::reportFromDate($request->beginDate, $request->endDate);
    //     $pdf = PDF::loadHTML('');
    //     $pdf->loadView('reports.pdfReport', ['payload' => $payload]);

    //     $pdf->setOption('header-html', '<h1>Título</h1>'); // . '/relatorio/header/' . $escola->id);
    //     $pdf->setOption('footer-html', '<h3>Sysbro &copy; 2022</h3>'); // . '/relatorio/footer-paginacao');

    //     $pdf->setOption('javascript-delay', 2000);
    //     $pdf->setOption('enable-javascript', true);
    //     $pdf->setOption('no-stop-slow-scripts', true);
    //     $pdf->setOption('header-spacing', 20);
    //     $pdf->setOption('margin-top', 20);
    //     $pdf->setOption('margin-left', 25);
    //     $pdf->setOption('margin-right', 25);
    //     $pdf->setOption('title', 'RELATÓRIO');
    //     return $pdf->stream();
    // }

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
