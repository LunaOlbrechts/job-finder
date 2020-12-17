<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $data = Company::all();
        return view('companies/index');
    }

    public function companyApi(){
        $data = Company::get();
        $companies = $data->toJson();
        return $companies;
    }

    public function profile($company)
    {
        $company = Company::where('id', $company)->with('internships')->first();
        $data['company'] = $company;
        $companyLong = $company->longitude;
        $companyLat = $company->latitude;
        
        $query = "SELECT *, DEGREES(ACOS(SIN(RADIANS(?)) * SIN(RADIANS(`latitude`)) +  COS(RADIANS(?)) * COS(RADIANS(`latitude`)) * COS(RADIANS(? - `longitude`)))) *6371 AS distance
                    FROM trains
                    ORDER BY distance ASC
                    LIMIT 1";
                    
        $getNearestTrainStation = DB::select(DB::raw($query), [
            $companyLat,
            $companyLat,
            $companyLong
        ]);
        
        $nearestTrainStation['getNearestTrainStation'] = $getNearestTrainStation;
        return view('companies/profile', $data, $nearestTrainStation);
    }
}
