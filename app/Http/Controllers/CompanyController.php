<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = DB::table('companies')->get();
        
        return view('companies/index', $data);
    }

    public function profile($company)
    {
        $company = Company::where('id', $company)->with('internships')->first();
        $data['company'] = $company;
    
        return view('companies/profile', $data);
    }
}