<?php

namespace App\Repositories\Classes;

use App\Repositories\Interfaces\IJobRepo;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JobRepo implements IJobRepo
{
    /**
     * Get all jobs 
     */
    function all($request)
    {
        //front search
        $search = $request->get('search');
        $address = $request->get('address');
        if ($search || $address) {
            $jobs = Job::where('position', 'LIKE', '%' . $search . '%')
                ->where('status', true)
                ->orWhere('title', 'LIKE', '%' . $search . '%')
                ->orWhere('type', 'LIKE', '%' . $search . '%')
                ->orWhere('address', 'LIKE', '%' . $address . '%')
                ->paginate(1);

            return view('candidate.jobs', compact('jobs'));
        }



        $keyword = $request->get('position');

        $type = $request->get('type');

        $category = $request->get('category_id');

        $province = $request->get('province');

        $address = $request->get('address');

        if ($keyword || $type || $category || $address || $province) {

            $jobs = Job::query();

            if ($keyword) {

                $jobs = $jobs->where('position', 'LIKE', '%' . $keyword . '%');
            }




            if ($category) {

                $jobs = $jobs->where('category_id', $category)->status('status', true);
            }

            if ($province) {

                $jobs = $jobs->where('province', $province)->where('status', true);
            }

            if ($type) {

                $jobs = $jobs->where('type', $type)->where('status', true);
            }



            if ($address) {

                $jobs = $jobs->where('address', 'LIKE', '%' . $address . '%')->where('status', false);
            }



            $jobs = $jobs->paginate(12);
            return view('candidate.jobs', compact('jobs'));
        } else {
            $jobs = Job::latest()->paginate(12);
            return view('candidate.jobs', compact('jobs'));
        }
    }

    /**
     * Latest jobs 
     */
    function latest()
    {
        return  Job::latest()->limit(4)->where('status', 1)->get();
    }

    /**
     * My Jobs
     */
    function myJobs()
    {
        return Job::where('dealership_id', auth()->user()->dealership->id)->where('status', true)->orderBy("created_at", 'desc')->get();
    }

    /**
     * Update 
     */
    function update($request, $id)
    {        
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->route('dealership.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Store 
     */
    function store($request)
    {
        Job::Create($request->all());
        return redirect()->route('dealership.index')->with('success', 'Job posted successfully!');
    }

    /**
     * Apply for a job 
     */
    function apply($request, $id)
    {
        $job = Job::find($id);
        $user = User::find(Auth::user()->id);
        $user->jobs()->attach($job->id);
        return redirect()->back()->with('success', 'Application sent!');
    }

    /**
     * Job Applicants 
     */
    function applicants($id)
    {
        $job =  Job::find($id);
        $job->load('users');
        return $job;
    }

    /**
     * Find Job
     */
    function find($id)
    {
        return Job::find($id);
    }

    /**
     * Dealer Jobs 
     */
    function dealerJobs($id)
    {
        return Job::where('dealership_id', $id)->where("status", true)->paginate(12);
    }

    /**
     * End Job
     */
    function end($id)
    {
        $job = Job::find($id);
        $job->status  = false;
        $job->update();
        return back()->with('success', 'Job ended successfully');
    }
}
