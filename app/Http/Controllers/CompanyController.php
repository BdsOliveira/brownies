<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function company () {
        $companies = Company::all();
        return view('company/companies', ['companies' => $companies]);
    }

    public function createCompany () {
        return view('/company/create-company');
    }

    public function store (Request $request){
        $company = new Company;
        $company->fill($request->all());
        $company->save();
        return redirect('/')->with('msg', 'Empresa cadastrada com sucesso!');;
    }
}
