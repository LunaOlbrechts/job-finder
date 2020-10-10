<?php

namespace Database\Seeders;

use App\Models\Internship;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Internship::factory()
        ->times(5)
        ->create();
    }
}
