<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ICategoryRepo;
use App\Repositories\Interfaces\IDealershipRepo;
use App\Repositories\Interfaces\IJobRepo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $job_repo;
    private $category_repo;
    private $dealer_repo;

    function __construct(IJobRepo $job_repo, ICategoryRepo $category_repo, IDealershipRepo $dealer_repo)
    {
        $this->job_repo = $job_repo;
        $this->category_repo = $category_repo;
        $this->dealer_repo = $dealer_repo;
    }

    public function index()
    {

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect('/dashboard');
        }
        
        return view('home');
    }

    public function home()
    {
        $user = Auth::user();

        if ($user->isSeeker()) {
            $jobs = $this->job_repo->latest();
            $categories = $this->category_repo->all();
            $cat_loops = ceil(count($categories) / 4);
            $dealers = $this->dealer_repo->topDealers();
    
            return view('candidate.index', compact('jobs', 'categories', 'cat_loops', 'dealers'));
        } elseif ($user->isEmployer()) {
            return redirect()->route('dealership.index');
        } elseif ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
    }
}
