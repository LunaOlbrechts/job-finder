<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:web');
        $this->middleware('guest:company');
    }

    public function showStudentRegisterForm()
    {
        return view('auth.register', ['url' => 'student']);
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

        return redirect()->intended('internships');
    }

    protected function createCompany(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $request->flash();
        
        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->location = $request->input('location');
        $company->longitude = $request->input('longitude');
        $company->latitude = $request->input('latitude');
        $company->bio = $request->input('bio');
        $company->phone = $request->input('phone');
        $company->password = Hash::make($request->input('password'));
        $company->save();
        
        return redirect('companies');
    }
}