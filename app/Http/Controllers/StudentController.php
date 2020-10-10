<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index(){

        $data['students'] = DB::table('students', 'luna')->first();
        return view('students/index', $data);
    }

    public function show(Student $student)
    {
        $data['kz'] = $student;
        return view('students/profile', $data);
    }
}
