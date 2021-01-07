<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Application;
use App\Models\StudentPreferences;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class InternshipController extends Controller
{
    public function index()
    {

        $data['internships'] = Internship::with('company')->get();

        if(Auth::guard('web')->user()){
            $student = StudentPreferences::where('student_id', Auth::guard('web')->user()->id)->first();

            $studentPref = [
                "regio" => $student->regio,
                "type" => $student->type,
            ];

            $data['suggestion'] = Internship::where('regio', $studentPref["regio"])->get();
        }
                
        $data['lastWeek']= $this->arrayDateLastWeek();
        
        return view('/internships/index', $data);
    }

    public function detail($internship)
    {
        $data['internship'] = Internship::where('id', $internship)->with('company')->first();
        
        return view('/internships/detail', $data);
    }

    public function create()
    {
        if(!Auth::guard('company')->user()){
            return redirect()->back();
        }

        return view('internships/create');
    }

    public function createInternship(Request $request)
    {
        $request->flash();
        
        $internship = new \App\Models\Internship();
        $internship->title = $request->input('title');
        $internship->bio = $request->input('bio');
        $internship->type = $request->input('type');
        $internship->expectations = $request->input('expectations');
        $internship->offers = $request->input('offers');
        $internship->location =$request->input('location');
        $internship->regio =$request->input('regio');
        $internship->company_id = $request->input('company_id');
        $internship->save();

        return redirect('/internships');
    }


    public function apply(Request $request){

        if(!Auth::guard('web')->user()){
            return redirect()->back();
        }

        $request->flash();
        
        $application = new \App\Models\Application();
        $application->motivation = $request->input('motivation');
        $application->label = "new";
        $application->student_id = auth()->id() ;
        $application->fase_id = 1 ;
        $application->cv = $request->input('cv');
        $application->website = $request->input('website');
        $application->internship_id = $request->input('internship');
        $application->save();

        return redirect('/internships');
    }

    public function searchResultsList(Request $request){
    
        $data['lastWeek']= $this->arrayDateLastWeek();

        $data["suggestion"] = NULL;

        if($request->type){ 
            $data["internships"] = Internship::
                                    where('type', $request->type)
                                    ->get();              
        }
        else{
            dd('Er zijn geen internships gevonden');
        }

        return view('/internships/index', $data);
    }

    public function arrayDateLastWeek()
    {
        // Get current date and subtract 7 days  
        // Front-end checks if created date from internship is 
        // less then 7 days from current date
        $now = Carbon::now();
        $lastWeek = $now->subtract(7, 'days');

        return $lastWeek;
    }
}