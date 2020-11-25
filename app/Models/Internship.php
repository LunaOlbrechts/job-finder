<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    public function company()
    {
        /* On to many relationship between internship and company 
        *   An internship has one company
        */
        return $this->belongsTo('\App\Models\Company');
    }

    public function application(){
        /* Many to many relationship between internship and application 
        *   An internship has many applications 
        */
        return $this->hasMany('App\Models\Application');
    }
}
