<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPreferences extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'regio',
    ];
    
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    protected $table = 'student_preferences';
}
