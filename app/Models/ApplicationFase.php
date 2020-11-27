<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Application;

class ApplicationFase extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function applications()
    {
        return $this->hasMany('App\Models\Application');
    }

    protected $table = 'application_fases';
}
