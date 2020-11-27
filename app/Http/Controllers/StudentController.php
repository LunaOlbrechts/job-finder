<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function index(){
        $data['students'] = DB::table('students')->get();
        
        return view('students/index', $data);
    }

    public function profile($studentId)
    {
        $student= Student::where('id', $studentId)->first();
        $application = Application::where('student_id', $studentId)->with(['student', 'applicationFase'])->get();        
        
        return view('students/profile')->withApplications($application)->withStudent($student);
    }

    public function editUserProfile(Student $student){
        //$user['students'] = DB::table('students')->get();
        /*if(Auth::user()) {
            $user = Student::find(Auth::user()->id);
            if($user){ 
                return view('students/update')->withStudent($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }*/

        $data['student'] = $student;
        
        return view('students/update', $data);
    }

    public function updateUserProfile(Request $request, $studentId){
        $user = DB::table('students')
            ->where('id', $studentId)
            ->first();
      // $user = Student::find(Auth::user()->id);
        if(!$user){
            return redirect()->back();
        }
        
        if ($user){
            $data = $request->validate([
                'name' => 'required|min:2',
                'age' => 'required|min:2',
                'bio' => 'nullable',
                'preference' => 'nullable',
                'tools' => 'nullable',
                //'cv' => 'nullable|file',
                'portfolio' => 'nullable|url',
                'location' => 'nullable',
                'linkedin' => 'nullable|url'
            ]);

            if ($user->email === $request['email']){
                $data;
                $request->validate([
                    'email' => 'required|email'
                ]);
            } else {
                $data;
                $request->validate([
                    'email' => 'required|email|unique:students'
                ]);
            }

            //location optimizer
            $request->flash();
            $adress = $request['location'];
            $url = "https://autocomplete.geocoder.ls.hereapi.com/6.2/suggest.json?apiKey=aIPQX3C8hUC98kgWUAdekaOUrrCI9Q1BtuCXIhJw1_k&query=$adress";
            $response = Http::get($url)->json();
            if($response['error'] == 'Unauthorized'){
                $myresponse = $request['location'];
            } else if($response['suggestions'] == NULL){
                $myresponse = $request['location'];
            } else {
                $myresponse = $response['suggestions'][0]['label'];
            } 

            //behance projecten vinden
                //$behance = $request['behance'];
                //$behanceUrl = "https://dribbble.com/oauth/authorize?client_id=959aa3996fcb9f13fd9565186b223482106125362514dfabc8153daed8efac1c";
                //$behanceResponse = Http::get($behanceUrl)->json();
                //dd($behanceResponse);
            
            //toevoegen aan db
                DB::table('students')->where('id', $studentId)->update($request->except('_token', 'location'));
                DB::table('students')->where('id', $studentId)->update(['location' => $myresponse]);
                $request->session()->flash('success', 'Your details have now been updated.');
                return redirect()->back();
        }
    }
}