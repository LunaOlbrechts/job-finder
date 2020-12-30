<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function internships()
    {
        /* On to many relationship between company and internship  
        *   A company has many internships
        */
        return $this->hasMany('App\Models\Internship');
    }
}
