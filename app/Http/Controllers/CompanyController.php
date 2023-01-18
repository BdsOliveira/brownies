<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Seller;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::paginate(10);
    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

    public function showSellers($company_id)
    {
        return Seller::where('company_id', $company_id)->get();
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
