<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Company;

class SellerController extends Controller
{
    public function sellers()
    {
        $sellers = Seller::all();
        return view('sellers/sellers', ['sellers' => $sellers]);
    }

    public function createSeller()
    {
        $companies = Company::all();
        return view('/sellers/create-seller', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $seller = new Seller;

        $seller->fill($request->all());
        $seller->save();

        return redirect('/sellers')->with('msg', 'Vendedor cadastrado com sucesso!');;
    }
}
