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
        return Order::with('seller')->paginate(15);
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function update(Request $request)
    {
        Order::findOrFail($request->id)->update($request->all());
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }

    public function delete($id)
    {
        Order::findOrFail($id)->delete();
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }
    // public function viewOrders()
    // {
    //     $companies = Company::all();
    //     $sellers = Seller::all();
    //     return view('/orders/create-order', ['companies' => $companies, 'sellers' => $sellers]);
    // }

    // public function store(Request $request)
    // {
    //     $order = new Order;
    //     $order->fill($request->all());
    //     $order->save();
    //     return redirect('/orders/create')->with('msg', 'Venda registrada com sucesso!');
    // }

    // public function destroy($id)
    // {
    //     Order::findOrFail($id)->delete();
    //     return redirect('/report')->with('msg', 'Venda excluída com sucesso.');
    // }

    // public function edit($id)
    // {
    //     $order = Order::findOrFail($id);
    //     $seller = Seller::find($order->id_seller);
    //     $company = Company::find($seller->id_company);
    //     return view('orders.edit-order', ['order' => $order, 'seller' => $seller, 'company' => $company]);
    // }

    // public function update(Request $req)
    // {
    //     Order::findOrFail($req->id)->update($req->all());
    //     return redirect('/report')->with('msg', 'Venda editada com sucesso.');
    // }
}
