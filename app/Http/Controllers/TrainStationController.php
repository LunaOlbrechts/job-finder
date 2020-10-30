<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\TrainStation;

class TrainStationController extends Controller
{
    public function trainStations()
    {        
        $apiLink = 'https://api.irail.be/stations/?lang=nl&format=json';
        $response = Http::withHeaders([
            'Accept' => 'application/json'])->get($apiLink)->json();

        foreach ($response["station"] as $station){ 
            $data = array('name' => $station['name']);
            TrainStation::insert($data);            
        }
    }
} 