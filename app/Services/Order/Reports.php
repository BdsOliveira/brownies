<?php

namespace App\Services\Order;

use App\Models\Order;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class Reports
{
    const BROWNIE_PRICE = 5;

    public function reportFromDays(CarbonInterface $beginDate, CarbonInterface $endDate)
    {
        return Order::with(['seller'])->whereBetween('date', [$beginDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->latest()
            ->get();
    }

    public function faturamento(Collection $collection)
    {
        $invoice = 0;
        foreach ($collection as $order) {
            $invoice += $order->quantity;
        }
        return $invoice * self::BROWNIE_PRICE;
    }
}
