<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealerRequest;
use App\Models\Dealership;
use App\Models\Job;
use App\Repositories\Interfaces\IDealershipRepo;
use App\Repositories\Interfaces\IGroupRepo;
use App\Repositories\Interfaces\IJobRepo;
use App\Repositories\Interfaces\IProvinceRepo;
use App\Repositories\Interfaces\IUserRepo;
use Illuminate\Http\Request;

class DealershipController extends Controller
{
    private $dealer_repo;
    private $province_repo;
    private $group_repo;
    private $job_repo;
    private $user_repo;

    function __construct(IDealershipRepo $dealer_repo, IProvinceRepo $province_repo, IGroupRepo $group_repo, IJobRepo $job_repo, IUserRepo $user_repo)
    {
        $this->dealer_repo = $dealer_repo;
        $this->province_repo = $province_repo;
        $this->group_repo = $group_repo;
        $this->job_repo = $job_repo;
        $this->user_repo = $user_repo;
    }

    function register()
    {
        dd("hi");
    }

    public function index()
    {
        $dealership = $this->dealer_repo->myDealer();
        $jobs = $this->job_repo->myJobs();
        return view('dealership.index', compact('dealership', 'jobs'));
    }

    public function create()
    {
        $provinces = $this->province_repo->all();
        $groups = $this->group_repo->all();
        return view('dealership.create', compact('provinces', 'groups'));
    }

    public function show()
    {
        $dealership = $this->dealer_repo->myDealer();
        return view('dealership.show', compact('dealership'));
    }

    public function edit()
    {
        $dealership = $this->dealer_repo->myDealer();
        $provinces = $this->province_repo->all();
        $groups = $this->group_repo->all();
        return view('dealership.edit', compact('dealership', 'provinces', 'groups'));
    }

    public function store(DealerRequest $request)
    {
        $results = $this->dealer_repo->update($request);
        return $results;
    }

    public function coverPhoto(Request $request)
    {
        $results = $this->dealer_repo->uploadCoverPhoto($request);
        return $results;
    }

    public function dealerlogo(Request $request)
    {
        $results = $this->dealer_repo->uploadLogo($request);
        return $results;
    }

    public function dealerJobs($id)
    {
        $jobs = $this->job_repo->dealerJobs($id);
        $dealership = $this->dealer_repo->find($id);
        return view('candidate.dealer_jobs', compact('jobs', 'dealership'));
    }

    public function findCandidate($id)
    {
        $user = $this->user_repo->find($id);
        return view('dealership.show_candidate', compact('user'));
    }
}
