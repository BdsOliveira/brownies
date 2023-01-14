<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::with('sellers')->paginate(10);
    }

    public function show($id)
    {
        return Company::with('sellers')->findOrFail($id);
    }

    public function store(Request $request)
    {
        return Company::create($request->all());
    }

    public function update(Request $request)
    {
        return Company::findOrFail($request->id)->update($request->all());
    }

    public function delete($id)
    {
        return Company::findOrFail($id)->delete();
    }
}
