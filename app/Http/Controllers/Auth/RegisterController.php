<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function showStudentRegisterForm()
    {
        return view('auth/register', ['url' => 'student']);
    }

    public function showCompanyRegisterForm()
    {
        return view('auth/registerCompany', ['url' => 'company']);
    }

    protected function createStudent(Request $request)
    {
        $student = Student::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        Auth::guard('web')->login($student);
        $id = Auth::guard('web')->user()->id;

        return  redirect()->route('showPreferencesForm',['studentId' => $id]);
    }

    protected function createCompany(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $request->flash($request->input('longitude'));
        
        $company = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'location' => $request->input('location'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'bio' => $request->input('bio'),
            'logo' => "https://media-exp1.licdn.com/dms/image/C560BAQEz1oTWv7drKA/company-logo_200_200/0/1519899028243?e=1617840000&v=beta&t=MjcLhtp4ejYGgEtZxiCLtA1dyZ1TK2J8Rgt9Mb1XKyg",
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);      

        Auth::guard('company')->login($company);

        return redirect()->route('companies');
    }
}