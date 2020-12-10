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
                'title' => "first interview",
            ],
            [
                'title' => "asignment",
            ],
            [
                'title' => "second interview",
            ],
        ]);
    }
}
