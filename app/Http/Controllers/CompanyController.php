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





    public function showAllInfoForUpdateProfile($company)
    {
        $company = Company::where('id', $company)->first();
        $data['company'] = $company;
        return view('companies/update', $data);
    }

    public function updateCompanyProfile(Request $request, $company)
    {
        //Alle huidige informatie van de huidige company ophalen
        $user = Company::where('id', $company)->first();

        //Als er geen user gevonden wordt met de id: terugsturen
        if (!$user) {
            return redirect()->back();
        }
        //Alle data van de huidige user valideren
        if ($user) {
            $request->validate([
                'name' => 'required|min:2',
                'bio' => 'nullable',
                'projects' => 'nullable',
                'employees' => 'nullable',
                'location' => 'nullable',
                'email' => 'required|email',
                'phone' => 'required|min:2',
                'logo' => 'nullable|url'
            ]);
        
            //Alles toevoegen aan db
            Company::where('id', $company)->update($request->except('_token', 'submit'));
            //success boodschap printen
            $request->session()->flash('success', 'Your details have now been updated.');
            return redirect()->back();
        }
    }
}
