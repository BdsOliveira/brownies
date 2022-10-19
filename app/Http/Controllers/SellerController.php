<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Company;

class SellerController extends Controller
{
    public function viewSellers()
    {
        $sellers = Seller::all();
        return view('sellers/sellers', ['sellers' => $sellers]);
    }

    public function viewCreateSeller()
    {
        $companies = Company::all();
        return view('/sellers/create-seller', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $seller = new Seller;

        $seller->fill($request->all());
        $seller->save();

        return redirect('/management/sellers')->with('msg', 'Vendedor cadastrado com sucesso!');;
    }

    public function destroy($id)
    {
        Seller::findOrFail($id)->delete();
        return redirect('/management/sellers')->with('msg', 'Vendedor excluído com sucesso.');
    }

    public function edit($id)
    {
        $seller = Seller::findOrFail($id);
        $companies = Company::all();
        return view('/sellers/edit-seller', ['seller' => $seller, 'companies' => $companies]);
    }

    public function update(Request $req)
    {
        Seller::findOrFail($req->id)->update($req->all());
        return redirect('/management/sellers')->with('msg', 'Vendedor editado com sucesso.');
    }
}
