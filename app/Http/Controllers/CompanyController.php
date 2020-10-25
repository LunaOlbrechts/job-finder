<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
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

    public function edit(Request $request, $company){
        $post = DB::table('applications')->where('id', auth()->id());


        $data = DB::table('applications')
            ->select('applications.id', 'applications.label', 'applications.created_at', 'applications.user_id', 'applications.internship_id', 'students.name', 'internships.company_id', 'internships.bio')
            ->orderBy('applications.id', 'desc')
            ->join('internships', 'applications.internship_id', '=', 'internships.id')
            ->join('students', 'applications.user_id', '=', 'students.id')
            ->where('internships.company_id', $company)
            ->get();
        

        if($request->label){
            $post->whereHas('label',function($q) use ($request){
                $q->where('label',$request->label);
            });
        }

        if($request->keyword){
            $post->whereHas('internship', 'LIKE','%' . $request->keyword . '%');
        }

        return view('companies/filter')->withApplications($data);
    }
}