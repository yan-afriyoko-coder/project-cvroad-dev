<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IExperienceRepo;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    private $experience_repo;
    function __construct(IExperienceRepo $experience_repo)
    {
        $this->experience_repo = $experience_repo;
    }

    function store(Request $request)
    {
        $results = $this->experience_repo->create($request);
        return $results;
    }

    function delete(Request $request, $id)
    {
        $results = $this->experience_repo->delete($request, $id);
        return $results;
    }
}
