<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('company')->latest()->paginate(10);
    }

    public function show($id)
    {
        return Product::with('company')->findOrFail($id);
    }

    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    public function update(Request $request)
    {
        return Product::findOrFail($request->id)->update($request->all());
    }

    public function delete($id)
    {
        return Product::findOrFail($id)->delete();
    }
}
