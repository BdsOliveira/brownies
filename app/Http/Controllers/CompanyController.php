<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::latest()->get();
    }

    public function show($id)
    {
        return Company::findOrFail($id);
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

    public function showSellers($company_id)
    {
        return Seller::where('company_id', $company_id)
            ->with('company')
            ->latest()
            ->get();
    }

    public function showProducts($company_id)
    {
        return Product::where('company_id', $company_id)
            ->with('company')
            ->latest()
            ->get();
    }

    public function showOrders($company_id)
    {
        $sellers = Seller::select('id')
            ->where('company_id', $company_id)
            ->get();
        return
            Order::whereIn('seller_id', $sellers)
                ->with([
                    'seller' => function ($query) {
                        return $query->with('company');
                    },
                    'product' => function ($query) {
                        return $query->with('company');
                    }
                ])
                ->latest()
                ->get();
    }

    public function showOrdersFromPeriod($company_id, $beginDate, $endDate)
    {
        $sellers = Seller::select('id')
            ->where('company_id', $company_id)
            ->get();
            $orders = Order::whereIn('seller_id', $sellers)
                ->whereBetween('date', [$beginDate, $endDate])
                ->with([
                    'seller' => function ($query) {
                        return $query->with('company');
                    },
                    'product' => function ($query) {
                        return $query->with('company');
                    }
                ])
                ->latest()
                ->get();
        return ReportController::invoicing($orders);
    }
}
