<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\TrainStation;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = DB::table('companies')->get();
        
        return view('companies/index', $data);
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
                    
        $station = DB::select(DB::raw($query), [
            $companyLat,
            $companyLat,
            $companyLong
        ]);
        
        $dat['stations'] = $station;
        dd($dat);
        
        return view('companies/profile', $data);
    }
}