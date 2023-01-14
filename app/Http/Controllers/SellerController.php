<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;

class SellerController extends Controller
{
    public function index()
    {
        return Seller::with('company')->paginate(10);
    }

    public function show($id)
    {
        return Seller::with('company')->findOrFail($id);
    }

    public function store(Request $request)
    {
        return Seller::create($request->all());
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
