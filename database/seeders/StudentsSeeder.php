<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->insert([
            [

                'name' => "Luna",
                'email'=> "luna.olbrechts@gmail.com",
                'password'=> "test",
                'age'=> "22",
                'portfolio'=> "",
                'preference'=> "test",
                'tools'=> "test",
                'location'=> "Steendorp",
                'bio'=> "test",
                //'cv'=> "test",
                'linkedin' => ""
            ],
            [
     
                'name' => "Britt",
                'email'=> "britt.vdl@hotmail.com",
                'password'=> "testing",
                'age'=> "20",
                'portfolio'=> "",
                'preference'=> "Development",
                'tools'=> "test",
                'location'=> "Minderhout",
                'bio'=> "test",
                //'cv'=> "working on it",
                'linkedin' => ""
            ],
            [
                'name' => "Jasper",
                'email'=> "jasper@gmail.com",
                'password'=> "tester",
                'age'=> "21",
                'portfolio'=> "",
                'preference'=> "Project manager",
                'tools'=> "test",
                'location'=> "Mechelen",
                'bio'=> "Just writing something",
                //'cv'=> "tester",
                'linkedin' => ""
            ],
            [
                'name' => "Benjamin",
                'email'=> "benjamin@gmail.com",
                'password'=> "12345",
                'age'=> "23",
                'portfolio'=> "",
                'preference'=> "Design",
                'tools'=> "test",
                'location'=> "Mechelen",
                'bio'=> "Mijn bio",
                //'cv'=> "In the making",
                'linkedin' => ""
            ]
        ]);

    }
}