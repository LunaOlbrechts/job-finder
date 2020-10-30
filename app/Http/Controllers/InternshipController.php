<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = DB::table('internships')->get();
        
        return view('/internships/index', $data);
    }

    public function detail($internship)
    {
        //$data['internship'] = Internship::where('id', $internship)->with('company')->get();
        $data['internship'] = DB::table('internships')->where('id', $internship)->get();
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
        $application->user_id = "1";
        $application->internship_id = $request->input('internship');
        $application->save();

        return redirect('/internships');
    }
}