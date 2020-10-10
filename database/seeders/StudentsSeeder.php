<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new \App\Models\Student();
        $student->name = "Luna";
        $student->email= "luna.olbrechts@gmail.com";
        $student->password= "test";
        $student->age= "22";
        $student->fase= "1";
        $student->preference= "test";
        $student->tools= "test";
        $student->location= "Steendorp";
        $student->bio= "test";
        $student->cv= "test";
        $student->save();
    }
}
