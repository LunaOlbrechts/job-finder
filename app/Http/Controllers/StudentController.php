<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Http;

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

    public function edit(Student $student){
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

    public function update(Request $request, $id){
        $user = DB::table('students')
            ->where('id', $id)
            ->first();
      // $user = Student::find(Auth::user()->id);
        if ($user){
            /*if($cv = $request->file('cv')){
                $name = $cv->getClientOriginalName();
                if($cv->move('cv', $name)){
                    $request['cv'] = $name;

                    dd($request->all());*/
   
            
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

            $adress = $request['location'];
            $url = "https://autocomplete.geocoder.ls.hereapi.com/6.2/suggest.json?apiKey=cRpECXLczLUIfUJVWoh-zg6XvvMbc8kKeQVk0k5lyPY&query=$adress";
            $response = Http::get($url)->json();
            if($response['suggestions'] == NULL){
                $myresponse = $request['location'];
            } else {
                $myresponse = $response['suggestions'][0]['label'];
            }
       
                DB::table('students')->where('id', $id)->update($request->except('_token', 'location'));
                DB::table('students')->where('id', $id)->update(['location' => $myresponse]);
                $request->session()->flash('success', 'Your details have now been updated.');
                return redirect()->back();
        } else {
            return redirect()->back();
        }
    //}};
    }
}