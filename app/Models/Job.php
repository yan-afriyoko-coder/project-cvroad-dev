<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Job extends Model

{
    protected $fillable = ['user_id', 'dealership_id', 'title', 'slug', 'description', 'duties', 'category_id', 'position', 'address', 'type', 'status', 'last_date', 'number_of_vacancy', 'years_experience', 'gender', 'salary_range', 'qualification', 'province', 'brand_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function dealership()
    {
        return $this->belongsTo(Dealership::class);
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class)->withTimestamps();
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'job_users', 'job_id', 'user_id');
    }

    public function checkApplication()
    {
        return DB::table('job_user')->where('user_id', auth()->user()->id)->where('job_id', $this->id)->exists();
    }
}
