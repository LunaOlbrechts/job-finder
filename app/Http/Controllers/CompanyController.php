<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function getAllCompanies()
    {
        $data = Company::all();
        return view('companies/index');
    }

    public function apiGetAllCompanies()
    {
        $data = Company::get();
        $companies = $data->toJson();

        return $companies;
    }

    public function getCompanyWithNearestTrainStation($company)
    {
        // Get current company on id
        $company = Company::where('id', $company)->with('internships')->first();
        $data['company'] = $company;
        $companyLong = $company->longitude;
        $companyLat = $company->latitude;
        
        // Query the nearest trainstation from company based on lat and long
        $query = "SELECT *, DEGREES(ACOS(SIN(RADIANS(?)) * SIN(RADIANS(`latitude`)) +  COS(RADIANS(?)) * COS(RADIANS(`latitude`)) * COS(RADIANS(? - `longitude`)))) * 6371 AS distance
                    FROM trains
                    ORDER BY distance ASC
                    LIMIT 1";
        
        // Execute the query to get the nearest train station from company
        $getNearestTrainStation = DB::select(DB::raw($query), [
            $companyLat,
            $companyLat,
            $companyLong
        ]);
        
        // Make array with the nearest train station
        $nearestTrainStation['getNearestTrainStation'] = $getNearestTrainStation;

        return view('companies/profile', $data, $nearestTrainStation);
    }
}
