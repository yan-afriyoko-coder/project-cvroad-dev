<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    public function users()
    {

        return $this->hasMany('App\Job');
    }
}
