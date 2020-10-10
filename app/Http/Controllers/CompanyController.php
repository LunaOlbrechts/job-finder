<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = DB::table('company')->get();
        return view('companies/index', $data);
    }

    public function detail(Company $company)
    {
        $data['company'] = $company;
        return view('companies/profile', $data);
    }
}
