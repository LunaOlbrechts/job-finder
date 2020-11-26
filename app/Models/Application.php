<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function student(){
        /* Many to many relationship between application and student 
        *   An application has a student
        */
        return $this->belongsTo('App\Models\Student');
    }

    public function internship(){
        /* Many to many relationship between application and internship 
        *   An application belongs to an internship
        */
        return $this->belongsTo('App\Models\Internship');
    }

    public function applicationFase(){
        /* Many to many relationship between application and internship 
        *   An application belongs to an internship
        */
        return $this->belongsTo('App\Models\ApplicationFase');
    }
}
