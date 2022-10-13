<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Seller;
use App\Services\Order\Reports;
use Carbon\Carbon;

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
        return view('/reports/report', ['payload' => $invoice, 'visible' => 'hidden']);
    }

    public function invoicing($beginDate, $endDate)
    {
        $orders = (new Reports)->reportFromDays($beginDate, $endDate);
        $faturamento = (new Reports)->faturamento($orders);

        $payload = [
            'orders' => $orders,
            'faturamento' => $faturamento
        ];
        return $payload;
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
