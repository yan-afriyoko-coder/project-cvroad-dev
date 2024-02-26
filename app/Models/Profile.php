<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{

    use SoftDeletes;

    // protected $gaurded = [];
    protected $fillable = [
        'user_id', 'slug', 'identification_number', 'name', 'surname', 'title', 'race', 'dealer_experience',
        'bio', 'driver_liscence', 'notice_period', 'area', 'group_id', 'employment_status', 'address',
        'phone_number', 'gender', 'dob', 'experience', 'salary_range', 'first_language', 'second_language', 'third_language',
        'fourth_language', 'title_job1', 'employer_job1', 'date_job1', 'title_job2', 'employer_job2', 'date_job2', 'profile_status', 'title_id',
        'fl1', 'fl2', 'fl3', 'fl4', 'category_id', 'brand_id', 'province', 'cover_letter','cv','certificates','payslips','other_documents'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Province()
    {
        return $this->hasOne(Province::class);
    }

    public function Title()
    {
        return $this->hasOne(Title::class);
    }

    function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    function department()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    function group()
    {
        return $this->belongsTo(Group::class, "group_id");
    }

    function brand()
    {
        return $this->belongsTo(Brand::class, "brand_id");
    }
}
