<?php

namespace App\Models;

use App\Models\Profile;



use Illuminate\Database\Eloquent\Model;

class Dealership extends Model
{
    protected $fillable = [
        'user_id', 'dname', 'slug', 'address', 'phone', 'website', 'logo', 'cover_photo', 'slogan', 'group_id', 'description', 'vat_no', 'province'
    ];


    public function jobs()
    {

        return $this->hasMany(Job::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
