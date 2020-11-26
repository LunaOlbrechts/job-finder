<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Student;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function showListOfAllApplications($companyId)
    {
        $applications = Application::select('applications.*')
        ->join('internships','internships.id', '=', 'applications.internship_id')
        ->with(['internship', 'student'])
        ->where('internships.company_id', $companyId)
        ->get();
        
        return view('companies/filter')->withApplications($applications);
    }

    public function EditStatusOfApplication(Request $request, $companyId)
    {
        $application = Application::get()->where('id', auth()->id());
        
        dd($application);

        if($request->label){
            $application->whereHas('label',function($q) use ($request){
                $q->where('label',$request->label);
            });
        }

        if($request->keyword){
            $application->whereHas('internship', 'LIKE','%' . $request->keyword . '%');
        }

        //return view('companies/filter')->withApplications($data);
    }

    public function file_update(Request $request, $application){
        if(isset($_POST['decline'])){
            DB::table('applications')
                ->where('id', $application)
                ->update(['label' => 'declined']);

            return redirect()->back();
        }elseif(isset($_POST['approve'])){
            DB::table('applications')
                ->where('id', $application)
                ->update(['label' => 'approved']);

            return redirect()->back();
        }
        
        return redirect()->back();
    }
}
