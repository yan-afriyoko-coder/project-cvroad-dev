<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "user_id",
        "title",
        "company",
        "start_date",
        "end_date",
        "present",
        "manager",
        "phone",
    ];

    function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
