<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class title extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Category');
    }

    public function candidate()
    {
        return $this->belongsTo('App\Profile');
    }
}
