<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationFase extends Model
{
    use HasFactory;

    public function application()
    {
        return $this->hasMany('App\Models\Application');
    }

    protected $table = 'applications_fases';
}
