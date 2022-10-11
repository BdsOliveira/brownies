<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Company;

class OrderController extends Controller
{
    public function orders(){
        $companies = Company::all();
        $sellers = Seller::all();
        return view('/orders/create-order', ['companies' => $companies, 'sellers' => $sellers]);
    }
}
