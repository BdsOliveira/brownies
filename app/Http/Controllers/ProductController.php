<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::get());
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function update(Request $request)
    {
        Product::findOrFail($request->id)->update($request->all());
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }
}
