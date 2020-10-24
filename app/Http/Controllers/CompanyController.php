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
        $response = Http::get('https://docs.irail.be/stations/');
        dd($response->json());
        return view('companies/index', $data);
    }

    public function profile($company)
    {
        $data['company'] = Company::where('id', $company)->with('internships')->get();
        //dd($data);
        return view('companies/profile', $data);
    }
    
    public function publicTransportation()
    {
        $response = Http::get(' https://docs.irail.be/#stations/{json,nl}');
        $data = $response->json();
        dd($data);
    }
}