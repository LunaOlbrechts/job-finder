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
        ->where('internships.company_id', 4)
        ->get();
        
        return view('companies/filter')->withApplications($applications);
    }
}
