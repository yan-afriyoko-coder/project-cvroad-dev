<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Title;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\IBrandRepo;
use App\Repositories\Interfaces\ICategoryRepo;
use App\Repositories\Interfaces\IDriverRepo;
use App\Repositories\Interfaces\IGroupRepo;
use App\Repositories\Interfaces\IProvinceRepo;

class DynamicDependent extends Controller
{
    private $group_repo;
    private $cat_repo;
    private $brand_repo;
    private $driver_repo;
    private $province_repo;
    public function __construct(IGroupRepo $group_repo, ICategoryRepo $cat_repo, IBrandRepo $brand_repo, IDriverRepo $driver_repo, IProvinceRepo $province_repo)
    {
        $this->group_repo = $group_repo;
        $this->cat_repo = $cat_repo;
        $this->brand_repo = $brand_repo;
        $this->driver_repo = $driver_repo;
        $this->province_repo = $province_repo;
    }

    public function getCategories()
    {
        $groups = $this->group_repo->all();
        $cats = $this->cat_repo->all();
        $brands = $this->brand_repo->all();
        $drivers = $this->driver_repo->all();
        $provinces = $this->province_repo->all();
        return view('profile.index', compact('cats', 'groups', 'brands', 'drivers', 'provinces'));
    }

    public function getTitles($id)
    {
        $titles = DB::table("titles")->where("category_id", $id)->pluck("title", "id");
        return json_encode($titles);
    }
}
