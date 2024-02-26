<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public function titles()
    {
        return $this->hasMany('App\Title');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
