<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentPreferences;
use Illuminate\Support\Facades\Auth;



class StudentPreferencesController extends Controller
{
    public function showPreferencesForm (){

        return view('students/preferences');
    }

    public function createStudentPreferences(Request $request)
    {
        if($request){
            $preferences = StudentPreferences::create([
                'type' => $request['type'],
                'student_id' => Auth::id(),
                'regio' => $request['regio'],
            ]);
        }

        return redirect('/internships');
    }
}
