<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => "Calibrate",
                'bio'=> "Je werkt binnen een gemoedelijke sfeer waar je als nieuwe collega wordt verwelkomd met humor en een open geest. Je collega's staan klaar om te helpen en je ontvangt persoonlijke begeleiding bij al je ambities. Heb je vragen? Zowel je management als je directe collega's zijn meteen aanspreekbaar. Geen barrières, geen regeltjes. Gewoon gezond verstand, een flinke dosis humor en af en toe wat zelfrelativering ;-)",
                'projects'=> "Drupal platform voor Q8, multisite website platform voor een grote stad, Digitaal erfgoed platform met 3 websites in 1",
                'employees'=> "",
                'location'=> "Kontich",
                'longitude' => '51.144074',
                'latitude' => '4.447773',
                'email'=> "jobs@calibrate.be",
                'phone'=> "042101632",
                'password'=> "test",
            ],
            [
                'name' => "Multimedium",
                'bio'=> "Je bent op zoek naar dé ultieme stageplek. Met andere woorden: je vraagt je af van waaruit je de wereld zal beginnen veroveren. Al eens aan de Noorderkempen gedacht? Daar vind je Multimedium, een enthousiaste bende digitale experts die elke dag sterke websites en apps maken. Hier leer je volle bak nieuwe dingen en maak je al snel deel uit van het team. Je zal merken dat dit het coolste webbedrijf ter wereld is. Of toch al zeker van de Noorderkempen.",
                'projects'=> "Studio 100, njam, orange, IKOOK gent",
                'employees'=> "13",
                'location'=> "Antwerpen (HQ)
                Minderhoutsestraat 1
                2320 Hoogstraten",
                'longitude' => '51.144074',
                'latitude' => '4.447773',
                'email'=> "hallo@multimedium.be",
                'phone'=> "+3232977154",
                'password'=> "test",
            ],
            [
                'name' => "Digitag",
                'bio'=> "SYNERGY
                Because we believe that the best ideas and the maximum results come from good collaborations.Our clients are also part of our team.
                
                PASSION
                Because we are driven by excellence and we really really really love what we do.
                
                PERFORMANCE
                Because objectives keep us going forward. We consider our job complete once results are exceeded. By far!",
                'projects'=> "WWF, tafsquare, Nooz Optics",
                'employees'=> "15",
                'location'=> "Chaussée de la Hulpe, 185
                1170 Brussels
                Belgium",
                'email'=> "hello@digitag.co",
                'phone'=> "3232977154",
                'password'=> "test",
                'longitude' => '51.144074',
                'latitude' => '4.447773',

            ],
            [
                'name' => "Lunar",
                'bio'=> "Nobody can time the market, it’s time in the market. Innovation is an incremental process that focuses on building, learning and iterating.

                Lunar has a proven track record in enabling these innovation-tracks for scaling and established companies.
                
                Let's talk today and start building tomorrow",
                'projects'=> "Antwerp management school, payroller, FOMU, homeBarista",
                'employees'=> "20",
                'location'=> "Lunar HQ

                Sint-Paulusplaats 19
                
                2000 Antwerpen",
                'email'=> "",
                'phone'=> "3232977154",
                'password'=> "test",
                'longitude' => '51.144074',
                'latitude' => '4.447773',
            ],
            [
                'name' => "World of digits",
                'bio'=> "Users at the center of companies' transformation
                We are an international digital partner specialised in User Experience optimization, Agile transformation, Product Ownership, Customer Analytics and Project Management through an active collaboration.",
                'projects'=> "224",
                'employees'=> "140",
                'location'=> "Sluisweg 1/bus 15
                Blue Tower 1
                9000 Gent",
                'longitude' => '51.144074',
                'latitude' => '4.447773',
                'email'=> "",
                'phone'=> "+3228992020",
                'password'=> "test"

            ],
            [
                'name' => "8trust",
                'bio'=> "Do you have a project that requires IT expertise or skills? 8Trust can help you find an effective solution that meets your expectations.

                Through its Consultancy and Web Development offer, 8Trust is made up of a dynamic and creative team. The development and long-term support of customers by our employees make 8Trust an ideal IT partner. 8Trust supports innovative projects through technical versatility and systematic structural reflection.
                
                This team, which also has entrepreneurial expertise, will be able to meet your needs and expectations by offering you personalized, effective and sustainable solutions.",
                'projects'=> "Makisu, Beci, MIEU, Star, Posidonia",
                'employees'=> "7",
                'location'=> "8TRUST SRL
                RUE DU MAIL, 50
                1050 BRUSSELS
                VAT BE0537.939.729",
                  'longitude' => '51.144074',
                'latitude' => '4.447773',
                'email'=> "hello@8trust.com",
                'phone'=> "+32492738878",
                'password'=> "test"

            ],
            
        ]);
    }
}