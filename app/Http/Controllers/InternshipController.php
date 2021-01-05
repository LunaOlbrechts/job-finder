<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = Internship::with('company')->get();
        
        $badgeNewThisWeek = [];

        $now = Carbon::now();
        $data['lastWeek'] = $now->subtract(7, 'days');

        return view('/internships/index', $data);
    }

    public function detail($internship)
    {
        $data['internship'] = Internship::where('id', $internship)->with('company')->first();
        return view('/internships/detail', $data);
    }


    public function create()
    {
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
        $internship->company_id = $request->input('company_id');
        $internship->save();

        return redirect('/internships');
    }


    public function apply(Request $request){
        $request->flash();
        
        $application = new \App\Models\Application();
        $application->motivation = $request->input('motivation');
        $application->label = "new";
        $application->user_id = 1;
        $application->internship_id = $request->input('internship');
        $application->save();

        return redirect('/internships');
    }

    public function searchResultsList(Request $request){
        
        $badgeNewThisWeek = [];
        $now = Carbon::now();
        $data['lastWeek'] = $now->subtract(7, 'days');

        if($request->type){ 
            $data["internships"] = Internship::
                                    where('type', $request->type)
                                    ->get();              
        }
        else{
            dd('Er zijn geen internships gevonden');
        }

        return view('internships/index', $data);
    }
}