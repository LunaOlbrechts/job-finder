<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    public function register()
    {
        return view('companies/register');
    }

    public function handleRegister(Request $request)
    {
        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->location = $request->input('location');
        $company->bio = $request->input('bio');
        $company->phone = $request->input('phone');
        $company->password = Hash::make($request->input('password'));
        $company->save();

        return redirect('register/company');
    }
    
    public function login()
    {
        return view('companies/login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $result = Auth::guard('company')->attempt($credentials);
        dd($result);
        //return view('companies/login');
    }

    public function index()
    {
        $data['companies'] = DB::table('companies')->get();
        return view('companies/index', $data);
    }

    public function profile($company)
    {
        $data['company'] = Company::where('id', $company)->with('internships')->get();
        //dd($data);
        return view('companies/profile', $data);
    }
}