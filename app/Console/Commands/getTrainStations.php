<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\TrainStation;

class getTrainStations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trainStation:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get train stations and insert in db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TrainStation::truncate();
        
        $apiLink = 'https://api.irail.be/stations/?lang=nl&format=json';
        $response = Http::withHeaders([
            'Accept' => 'application/json'])->get($apiLink)->json();
        
        foreach ($response["station"] as $station){ 
            $data = array(
                'uri' => $station['@id'],
                'name' => $station['name'],
                'longitude' => $station['locationX'],
                'latitude' => $station['locationY'],
                );
            TrainStation::insert($data);            
        }
    }
}