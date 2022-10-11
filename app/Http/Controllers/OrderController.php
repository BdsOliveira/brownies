<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Company;
use App\Models\Order;

class OrderController extends Controller
{
    public function orders(){
        $companies = Company::all();
        $sellers = Seller::all();
        return view('/orders/create-order', ['companies' => $companies, 'sellers' => $sellers]);
    }

    public function store (Request $request) {
        $order = new Order;
        $order->fill($request->all());
        $order->save();
        return redirect('/')->with('msg', 'Venda registrada com sucesso!');
    }
}
