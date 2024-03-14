<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Titles;
use App\Repositories\Interfaces\IBrandRepo;
use App\Repositories\Interfaces\ICategoryRepo;
use App\Repositories\Interfaces\IGroupRepo;
use App\Repositories\Interfaces\IUserRepo;
use DB;

class UserController extends Controller
{
    private $group_repo;
    private $cat_repo;
    private $brand_repo;
    private $user_repo;

    public function __construct(IGroupRepo $group_repo, ICategoryRepo $cat_repo, IBrandRepo $brand_repo, IUserRepo $user_repo)
    {
        $this->middleware('seeker');
        $this->group_repo = $group_repo;
        $this->cat_repo = $cat_repo;
        $this->brand_repo = $brand_repo;
        $this->user_repo = $user_repo;
    }

    public function index()
    {
        $profiles = Profile::latest()->paginate(20);

        return view('candidate_user.profile', compact('profiles'));
    }

    public function store(Request $request)
    {
        $results = $this->user_repo->updateProfile($request);
        return $results;
    }

    public function edit()
    {
        $groups = $this->group_repo->all();
        $cats = $this->cat_repo->all();
        $brands = $this->brand_repo->all();
        $drivers = $this->user_repo->drivers();
        $languages = $this->user_repo->languages();
        $fls = ([
            ["value" => 100, "level" => "Native"],
            ["value" => 65, "level" => "Fluent"],
            ["value" => 50, "level" => "Proficient"],
            ["value" => 25, "level" => "Basic"],
        ]);
        return view('candidate.edit', compact('groups', 'cats', 'brands', 'drivers', 'languages', 'fls'));
    }

    public function update(Request $request)
    {
        $results = $this->user_repo->updateProfile($request);
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }

    public function coverletter(Request $request)
    {
        $results = $this->user_repo->uploadCoverLetter($request);
        return $results;
    }


    public function cv(Request $request)
    {
        $results = $this->user_repo->uploadCV($request);
        return $results;
    }


    public function certificates(Request $request)
    {
        $results = $this->user_repo->uploadCertificates($request);
        return $results;
    }

    public function payslips(Request $request)
    {
        $results = $this->user_repo->uploadPaySlip($request);
        return $results;
    }


    public function other_documents(Request $request)
    {
        $results = $this->user_repo->uploadOtherDocs($request);
        return $results;
    }

    //Profile Picture
    public function avatar(Request $request)
    {
        $results = $this->user_repo->updateAvatar($request);
        return $results;
    }

    public function show()
    {
    }
}
