<?php

namespace App\Services\Order;

use App\Models\Order;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;

class Reports
{

    public function reportFromDays(CarbonInterface $beginDate, CarbonInterface $endDate)
    {
        return Order::whereBetween('date', [$beginDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->with([
                'product' => function ($query) {
                    return $query->with('company');
                },
                'seller' => function ($query) {
                    return $query->with('company');
            }])
            ->latest()
            ->get();
    }

    public function billing(Collection $collection)
    {
        $payload['amount'] = 0;
        $payload['comissions'] = 0;
        $payload['quantity'] = 0;
        foreach ($collection as $order) {
            $payload['amount'] += ($order->quantity * $order->product->price);
            $payload['comissions'] += ($order->quantity * $order->product->comission);
            $payload['quantity'] += $order->quantity;
        }
        return $payload;
    }
}
