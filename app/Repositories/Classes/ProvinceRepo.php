<?php

namespace App\Repositories\Classes;

use App\Models\Province;
use App\Repositories\Interfaces\IProvinceRepo;

class ProvinceRepo implements IProvinceRepo
{
    function all()
    {
        return Province::all();
    }
}
