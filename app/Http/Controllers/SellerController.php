<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    public function sellers () {
        $sellers = Seller::all();
        return view('sellers/sellers', ['sellers' => $sellers]);
    }

    public function createSeller () {
        return view('/sellers/create-seller');
    }
}
