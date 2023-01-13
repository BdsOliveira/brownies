<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    public function index()
    {
        return Seller::paginate(10);
    }

    public function show($id)
    {
        return Seller::get()->find($id);
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function update(Request $request)
    {
        return Seller::findOrFail($request->id)->update($request->all());
    }

    public function delete($id)
    {
        return Seller::findOrFail($id)->delete();
    }
}
