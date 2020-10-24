<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

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
        $location = $company->location;
        
        $apiLink = 'https://irail.be/stations/NMBS?lang=nl&format=json&q=' . $location;
        $response = Http::withHeaders([
            'Accept' => 'application/json'])->get($apiLink);
            
        return view('companies/profile', $data, $response);
    }
}