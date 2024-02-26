<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = 
    [
        "name"
    ];

    function dealerships()
    {
        return $this->hasMany(Dealership::class);
    }
}
