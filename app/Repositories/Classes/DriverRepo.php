<?php

namespace App\Repositories\Classes;

use App\Models\Driver;
use App\Repositories\Interfaces\IDriverRepo;

class DriverRepo implements IDriverRepo
{
    function all()
    {
        return Driver::all();
    }
}
