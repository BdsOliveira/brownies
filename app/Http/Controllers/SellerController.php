<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Services\Order\Reports;

class SellerController extends Controller
{
    public function index()
    {
        return Seller::with('company')
            ->latest()
            ->get()
            ->groupBy('company.name');
    }

    public function show($id)
    {
        return Seller::with('company')->findOrFail($id);
    }

    public function store(Request $request)
    {
        return Seller::create($request->all());
    }

    public function update(Request $request)
    {
        return Seller::findOrFail($request->id)->update($request->all());
    }

    public function delete($id)
    {
        return Seller::findOrFail($id)->delete();
    }

    public function showOrders($seller_id)
    {
        return
            Order::where('seller_id', $seller_id)
                ->with([
                    'product' => function ($query) {
                        return $query->with('company');
                    }
                ])
                ->with([
                    'seller' => function ($query) {
                        return $query->with('company');
                }])
                ->latest()
                ->get();
    }

    public function showOrdersFromPeriod($seller_id, $beginDate, $endDate)
    {
        $orders = Order::where('seller_id', $seller_id)
            ->whereBetween('date', [$beginDate, $endDate])
            ->with([
                'product' => function ($query) {
                    return $query->with('company');
                },
                'seller' => function ($query) {
                    return $query->with('company');
            }])
            ->latest()
            ->get();
        return ReportController::invoicing($orders);
    }
}
