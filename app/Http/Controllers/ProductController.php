<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('company')->latest()->get();
    }

    public function show($id)
    {
        return Product::with('company')->findOrFail($id);
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function update(Request $request)
    {
        return Product::findOrFail($request->id)->update($request->all());
    }

    public function delete($id)
    {
        return Product::findOrFail($id)->delete();
    }
    public function showOrders($product_id)
    {
        return Order::where('product_id', $product_id)
            ->with([
                'seller' => function ($query) {
                    return $query->with('company');
                }, 'product' => function ($query){
                    return $query->with('company');
                }])
                ->get();
    }

    public function showOrdersFromPeriod($product_id, $beginDate, $endDate)
    {
        $orders = Order::where('product_id', $product_id)
            ->whereBetween('date', [$beginDate, $endDate])
            ->with([
                'seller' => function ($query) {
                    return $query->with('company');
                }, 'product' => function ($query){
                    return $query->with('company');
                }])
                ->get();
        return ReportController::invoicing($orders);
    }
}
