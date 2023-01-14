<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::paginate(10);
    }

    public function show($id)
    {
        return Company::with('sellers')->find($id);
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function update(Request $request)
    {
        Company::findOrFail($request->id)->update($request->all());
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }

    public function delete($id)
    {
        Company::findOrFail($id)->delete();
        return response()->json(
            [
                'success'
            ],
            200,
        );
    }
    // public function companies()
    // {
    //     $companies = Company::all();
    //     return view('company/companies', ['companies' => $companies]);
    // }

    // public function viewCreateCompany()
    // {
    //     return view('/company/create-company');
    // }

    // public function store(Request $request)
    // {
    //     $company = new Company;
    //     $company->fill($request->all());
    //     $company->save();
    //     return redirect('/management/companies')->with('msg', 'Empresa cadastrada com sucesso!');
    // }

    // public function destroy($id)
    // {
    //     Company::findOrFail($id)->delete();
    //     return redirect('/management/companies')->with('msg', 'Empresa excluída com sucesso!');
    // }

    // public function edit($id)
    // {
    //     $company = Company::findOrFail($id);
    //     return view('/company/edit-company', ['company' => $company]);
    // }

    // public function update(Request $req)
    // {
    //     Company::findOrFail($req->id)->update($req->all());
    //     return redirect('/management/companies')->with('msg', 'Empresa atualizada com sucesso.');
    // }
}
