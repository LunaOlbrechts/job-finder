<?php

namespace Database\Seeders;

use App\Models\Application;
use Database\Factories\ApplicationFactory;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::factory()
            ->times(50)
            ->create();
    }
}
