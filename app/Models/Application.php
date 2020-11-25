<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function user(){
        /* Many to many relationship between application and student 
        *   An application has many students 
        */
        return $this->hasMany('App\Models\Student');
    }

    public function internship(){
        /* Many to many relationship between application and internship 
        *   An application has many internships 
        */
        return $this->hasMany('App\Models\Internship');
    }
}
