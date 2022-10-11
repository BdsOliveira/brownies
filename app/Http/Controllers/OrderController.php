<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders(){
        return view('/orders/create-order');
    }

}
