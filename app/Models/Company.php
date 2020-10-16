<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable 
{
    
    use HasFactory;

    public function internships()
    {
        return $this->hasMany('App\Models\Internship');
    }
}