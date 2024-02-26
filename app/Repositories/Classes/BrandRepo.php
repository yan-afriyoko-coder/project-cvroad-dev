<?php

namespace App\Repositories\Classes;

use App\Models\Brand;
use App\Repositories\Interfaces\IBrandRepo;

class BrandRepo implements IBrandRepo
{
    function all()
    {
        return Brand::all();
    }
}
