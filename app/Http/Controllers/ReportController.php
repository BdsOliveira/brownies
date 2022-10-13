<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\Order\Reports;


class ReportController extends Controller
{

    public function report()
    {
        $invoice = ReportController::invoicing(7);
        return view('/reports/report', ['payload' => $invoice]);
    }

    public function index()
    {
        $invoice = ReportController::invoicing(30);
        return view('/index', ['payload' => $invoice]);
    }

    public function invoicing($days)
    {
        $orders = (new Reports)->reportFromDays(now()->subDay($days), now());
        $faturamento = (new Reports)->faturamento($orders);

        $payload = [
            'orders' => $orders,
            'faturamento' => $faturamento
        ];
        return $payload;
    }
}
