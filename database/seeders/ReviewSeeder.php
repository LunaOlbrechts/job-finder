<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'internship_id' => "2",
                'students_id'=> "1",
                'content'=> "Dit was een leuke ervaring. Maar er werd van het begin al heel veel van mij verwacht.",
                'stars'=> "3"
            ],
            [
                'internship_id' => "1",
                'students_id'=> "2",
                'content'=> "Ik zou deze internship echt aanraden, ik heb mij goed geamusseerd met het team en heb tegelijkertijd heel veel bijgeleerd.",
                'stars'=> "4"
            ]
            
        ]);
    }
}