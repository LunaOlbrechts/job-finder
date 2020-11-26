<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(StudentsSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(InternshipSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(ApplicationFaseSeeder::class);
    }
}
