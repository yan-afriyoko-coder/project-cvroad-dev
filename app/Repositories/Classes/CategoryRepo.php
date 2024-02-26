<?php

namespace App\Repositories\Classes;

use App\Repositories\Interfaces\ICategoryRepo;
use App\Models\Category;

class CategoryRepo implements ICategoryRepo
{
    function all()
    {
        return Category::with('jobs')->get();;
    }
}
