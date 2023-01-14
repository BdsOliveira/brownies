<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Company;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return
            Order::with('seller')
            ->with('product')
            ->latest()
            ->paginate(15);
    }

    public function show($id)
    {
        return Order::with('seller')
            ->with('product')
            ->findOrFail($id);
    }
    public function store(Request $request)
    {
        return Order::create($request->all());
    }

    public function update(Request $request)
    {
        return Order::findOrFail($request->id)->update($request->all());
    }

    public function delete($id)
    {
        return Order::findOrFail($id)->delete();
    }
}
