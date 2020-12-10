<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Http;
use Goutte\Client;


class StudentController extends Controller
{
    public function index(){
        $data['students'] = DB::table('students')->get();
        
        return view('students/index', $data);
    }

    public function profile(Student $student)
    {
        $data['student'] = $student;
        
        return view('students/profile', $data);
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


            //dribbble projecten vinden
                //$dribbble = $request['dribbble'];
                //$dribbbleUrl = "https://dribbble.com/oauth/authorize?client_id=959aa3996fcb9f13fd9565186b223482106125362514dfabc8153daed8efac1c";
                //$dribbbleResponse = Http::get($dribbbleUrl)->json();
                //dd($dribbbleResponse);

            $client = new Client();
            $dribbbleUrl = "https://dribbble.com/BrittVdL";
            $crawler = $client->request('GET', $url);
            dd($crawler);
            
            //toevoegen aan db
                DB::table('students')->where('id', $studentId)->update($request->except('_token', 'location', 'submit'));
                DB::table('students')->where('id', $studentId)->update(['location' => $myresponse]);
                $request->session()->flash('success', 'Your details have now been updated.');
                //return redirect()->back();

                if($request->submit == "submit"){
                    if($request['dribbble'] == 'yes'){
                        $dribbbleUrl = "https://dribbble.com/oauth/authorize?client_id=08aafb61345f21793ebc76997fdd493f4c8a88b69bce02cc65566d197363ab23&redirect_uri=http://homestead.test/students/2/update&scope=public&state=e612e16d3c4d113573edb015d8eac1d5";
                        return redirect($dribbbleUrl);
                    } else {
                        return redirect()->back();
                    }
                } else {
                    dd($request);
                    $dribbbleResponse = "https://dribbble.com/oauth/token?client_id=08aafb61345f21793ebc76997fdd493f4c8a88b69bce02cc65566d197363ab23&client_secret=96acf0893efdb33f9ffb3399f073284d52acaa7ad9f840066e72cf86dfc9329f
                    &code=&redirect_uri=http://homestead.test/students/2";
                    dd($dribbbleResponse);
                }
            
            
        }
    }

    public function getDribbble(Request $request){
        dd("okey");
        dd($request->key);
        $dribbbleResponse = "https://dribbble.com/oauth/token?client_id=08aafb61345f21793ebc76997fdd493f4c8a88b69bce02cc65566d197363ab23&client_secret=96acf0893efdb33f9ffb3399f073284d52acaa7ad9f840066e72cf86dfc9329f
        &code=3d35bac80833ea8b557ee8799320dba9236ddae21e952304e0140537d0db2d99&redirect_uri=http://homestead.test/students/2";
        dd($dribbbleResponse);
    }
}