<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobUser extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "job_id",
        "user_id"
    ];

    function job()
    {
        return $this->belongsTo(Job::class, "job_id");
    }

    function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
