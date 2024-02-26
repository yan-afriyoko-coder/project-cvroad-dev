<?php

namespace App\Repositories\Classes;

use App\Models\Profile;
use App\Repositories\Interfaces\IProfileRepo;

class ProfileRepo implements IProfileRepo
{
    function find($id)
    {
        return Profile::find($id);
    }
}
