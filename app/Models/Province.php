<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

  public function user()
  {
    return $this->belongsToMany(User::class)->withTimestamps();
  }
}
