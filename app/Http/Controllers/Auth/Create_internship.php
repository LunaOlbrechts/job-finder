<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Company;
use App\Models\Internship;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Create_internship extends Controller
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


    public function showInternshipRegisterForm()
    {
        return view('internships.internship', ['url' => 'internship']);
    }


    protected function createInternship(Request $request)
    {

        
        $request->flash();
        
        $internship = new Internship();
        $internship->name = $request->input('name');
        $internship->email = $request->input('email');
        $internship->location = $request->input('location');
        $internship->bio = $request->input('bio');
        $internship->phone = $request->input('phone');
        $internship->password = Hash::make($request->input('password'));
        $internship->save();
        
        return redirect('register/company');
    }
}