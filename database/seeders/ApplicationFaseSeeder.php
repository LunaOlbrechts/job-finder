<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ApplicationFase;
use Illuminate\Support\Facades\Schema;

class ApplicationFaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_fases')->insert([
            [
                'id' => "1",
                'title' => "first interview",
            ],
            [
                'id' => "2",
                'title' => "asignment",
            ],
            [
                'id' => "3",
                'title' => "second interview",
            ],
        ]);
    }
}
