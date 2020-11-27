<?php

namespace Database\Seeders;

use App\Models\Application;
use Database\Factories\ApplicationFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Application::factory()
            ->times(10)
            ->create();
        Schema::enableForeignKeyConstraints();

    }
}
