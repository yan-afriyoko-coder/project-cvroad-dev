<?php

namespace App\Repositories\Classes;

use App\Models\WorkExperience;
use App\Repositories\Interfaces\IExperienceRepo;
use Illuminate\Queue\Worker;

class ExperienceRepo implements IExperienceRepo
{

    function create($request)
    {
        WorkExperience::create($request->all());
        return back()->with('success', 'Experience added successfully');
    }
    function userEperience($user_id)
    {
    }
    function update($request, $id)
    {
    }

    function delete($request, $id)
    {
        $exp = WorkExperience::find($id);
        $exp->delete();
        return back()->with('success', 'Experience deleted successfully');
    }
}
