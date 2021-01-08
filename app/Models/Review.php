<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function internship()
    {
        /* On to many relationship between internship and company 
        *   An internship has one company
        */
        return $this->belongsTo('\App\Models\Internship');
    }

    public function students()
    {
        /* On to many relationship between internship and company 
        *   An internship has one company
        */
        return $this->belongsTo('\App\Models\Student');
    }
}
