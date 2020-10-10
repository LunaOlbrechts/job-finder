<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;


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
}
