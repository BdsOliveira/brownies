<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function sellers () {
        return view('sellers/sellers');
    }

    public function createSeller () {
        return view('/sellers/create-seller');
    }
}
