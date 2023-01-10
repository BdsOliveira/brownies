<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Company;

class SellerController extends Controller
{
    public function index()
    {
        return response()->json(Seller::get());
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function update(Request $request)
    {
        Seller::findOrFail($request->id)->update($request->all());
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }

    public function delete($id)
    {
        Seller::findOrFail($id)->delete();
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }

    // Old endpoints
    // public function viewSellers()
    // {
    //     $sellers = Seller::all();
    //     return view('sellers/sellers', ['sellers' => $sellers]);
    // }

    // public function viewCreateSeller()
    // {
    //     $companies = Company::all();
    //     return view('/sellers/create-seller', ['companies' => $companies]);
    // }

    // public function store(Request $request)
    // {
    //     $seller = new Seller;

    //     $seller->fill($request->all());
    //     $seller->save();

    //     return redirect('/management/sellers')->with('msg', 'Vendedor cadastrado com sucesso!');;
    // }

    // public function destroy($id)
    // {
    //     Seller::findOrFail($id)->delete();
    //     return redirect('/management/sellers')->with('msg', 'Vendedor excluído com sucesso.');
    // }

    // public function edit($id)
    // {
    //     $seller = Seller::findOrFail($id);
    //     $companies = Company::all();
    //     return view('/sellers/edit-seller', ['seller' => $seller, 'companies' => $companies]);
    // }

    // public function update(Request $req)
    // {
    //     Seller::findOrFail($req->id)->update($req->all());
    //     return redirect('/management/sellers')->with('msg', 'Vendedor editado com sucesso.');
    // }
}
