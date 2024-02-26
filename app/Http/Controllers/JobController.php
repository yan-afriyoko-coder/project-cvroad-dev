<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Dealership;
use App\Http\Requests\JobPostRequest;

use App\Models\Category;
use App\Repositories\Interfaces\IBrandRepo;
use App\Repositories\Interfaces\ICategoryRepo;
use App\Repositories\Interfaces\IDealershipRepo;
use App\Repositories\Interfaces\IJobRepo;
use App\Repositories\Interfaces\IProvinceRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    private $job_repo;
    private $cat_repo;
    private $dealer_repo;
    private $province_repo;
    private $brand_repo;
    function __construct(IJobRepo $job_repo, ICategoryRepo $cat_repo, IDealershipRepo $dealer_repo, IProvinceRepo $province_repo, IBrandRepo $brand_repo)
    {
        $this->job_repo = $job_repo;
        $this->cat_repo = $cat_repo;
        $this->dealer_repo = $dealer_repo;
        $this->province_repo = $province_repo;
        $this->brand_repo = $brand_repo;
    }


    public function index()
    {
        // dd("hi htere");
        $jobs = $this->job_repo->latest();
        $categories = $this->cat_repo->all();
        $dealerships = $this->dealer_repo->random();
        return view('welcome', compact('jobs', 'dealerships', 'categories'));
    }

    public function show($id)
    {
        $job = $this->job_repo->find($id);
        return view('candidate.job', compact('job'));
    }


    public function myjob()
    {

        $jobs = $this->job_repo->myJobs();

        return view('jobs.myjob', compact('jobs'));
    }

    public function create()
    {
        $categories = $this->cat_repo->all();
        $provinces = $this->province_repo->all();
        $brands = $this->brand_repo->all();
        $dealership = $this->dealer_repo->myDealer();

        return view('jobs.create', compact('categories', 'provinces', 'brands', 'dealership'));
    }

    public function edit($id)
    {
        $job = $this->job_repo->find($id);
        $provinces = $this->province_repo->all();
        $categories = $this->cat_repo->all();
        return view('jobs.edit', compact('job', 'provinces', 'categories'));
    }

    public function update(JobPostRequest $request, $id)
    {        
        $this->job_repo->update($request, $id);
        return redirect()->back()->with('message', 'Job Sucessfully Updated!');
    }



    public function  store(JobPostRequest $request)
    {
        $dealership = $this->dealer_repo->myDealer();
        $request->merge(["dealership_id" => $dealership->id, "user_id" => Auth::user()->id, 'slug' => Str::slug(request('title'))]);
        $results = $this->job_repo->store($request);
        return $results;
    }

    public function apply(Request $request, $id)
    {
        $results = $this->job_repo->apply($request, $id);
        return $results;
    }

    public function applicants($id)
    {
        $dealership = $this->dealer_repo->myDealer();
        $job = $this->job_repo->applicants($id);
        return view('dealership.job_application', compact('job', 'dealership'));
    }

    public function allJobs(Request $request)
    {
        $results = $this->job_repo->all($request);
        return $results;
    }

    public function end($id)
    {
        $results = $this->job_repo->end($id);
        return $results;
    }
}
