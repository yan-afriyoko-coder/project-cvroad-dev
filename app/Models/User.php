<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {

        return $this->hasOne(Profile::class, "user_id");
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function dealership()
    {
        return $this->hasOne(Dealership::class);
    }

    public function Brand()
    {
        return $this->hasOne(Brand::class);
    }

    public function Driver()
    {
        return $this->hasOne(Driver::class);
    }


    public function Province()
    {
        return $this->hasOne(Province::class);
    }


    public function Group()
    {
        return $this->hasOne(Group::class);
    }

    public function Title()
    {
        return $this->hasMany(Title::class);
    }

    public function roles()
    {
        return $this->belongstoMany(Role::class);
    }

    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    public function isEmployer()
    {
        return $this->hasRole('Employer');
    }

    public function isSeeker()
    {
        return $this->hasRole('Seeker');
    }
    
    public function isSuperUser()
    {
        return $this->hasRole('Super User');
    }
       
    public function isAdminAccount()
    {
        return $this->hasRole('Admin Account');
    }   

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_users', 'user_id', 'job_id');
    }

    public function experience()
    {
        return $this->hasMany(WorkExperience::class);
    }
}
