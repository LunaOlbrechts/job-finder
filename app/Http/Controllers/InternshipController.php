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
        $data['internship'] = Internship::where('id', $internship)->with('company')->get();
        return view('/internships/detail', $data);
    }
}
