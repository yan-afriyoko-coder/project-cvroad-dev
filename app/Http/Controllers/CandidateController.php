<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Dealership;
use App\Models\User;
use App\Models\Profile;
use App\Repositories\Interfaces\IBrandRepo;
use App\Repositories\Interfaces\ICandidateRepo;
use App\Repositories\Interfaces\ICategoryRepo;
use App\Repositories\Interfaces\IProfileRepo;
use App\Repositories\Interfaces\IProvinceRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
  private $brand_repo;
  private $cat_repo;
  private $candidate_repo;
  private $profile_repo;
  private $province_repo;

  function __construct(IBrandRepo $brand_repo, ICategoryRepo $cat_repo, ICandidateRepo $candidate_repo, IProfileRepo $profile_repo, IProvinceRepo $province_repo)
  {
    $this->cat_repo = $cat_repo;
    $this->brand_repo = $brand_repo;
    $this->candidate_repo = $candidate_repo;
    $this->profile_repo = $profile_repo;
    $this->province_repo = $province_repo;
  }


  public function show($id, Profile $profile)
  {
    return view('profile.show', compact('profile'));
  }

  public function index(Request $request)
  {
    $candidates =  $this->candidate_repo->candidates($request);
    $brands = $this->brand_repo->all();
    $cats = $this->cat_repo->all();
    $provinces = $this->province_repo->all();
    return view('dealership.candidate', compact('candidates', 'brands', 'cats', 'provinces'));
  }
}
