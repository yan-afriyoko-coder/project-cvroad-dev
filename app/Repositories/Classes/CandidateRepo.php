<?php

namespace App\Repositories\Classes;

use App\Models\Dealership;
use App\Models\Profile;
use App\Repositories\Interfaces\ICandidateRepo;
use Illuminate\Support\Facades\Auth;

class CandidateRepo implements ICandidateRepo
{
    function candidates($request)
    {

        $title = $request->get('title');

        $type = $request->get('type');

        $category = $request->get('category_id');

        $province = $request->get('province');

        $brand = $request->get('brand_id');


        $address = $request->get('address');

        $race = $request->get('race');

        $dealer_experience = $request->get('dealer_experience');


        $user = Auth::user();

        $user_id = auth()->user()->id;

        $group_id =   Dealership::where('user_id', $user_id)->value('group_id');

        $candidates = Profile::query();

        if (Auth::user()) {
            if ($title || $type || $category || $address || $brand || $race || $dealer_experience || $province ) {


                if ($title) {
                    $candidates = Profile::where('title', 'LIKE', '%' . $title . '%')->paginate(18);
                }


                if ($category) {
                    $candidates = Profile::where('category_id', $category)->paginate(18);
                }


                if ($brand) {
                    $candidates = Profile::where('brand_id', $brand)->paginate(18);
                }

                if ($type) {
                    $candidates = Profile::where('type', $type)->paginate(18);
                }

                if($province)
                {                    
                    $candidates = Profile::where("province", $province)->paginate(81);
                }

                if ($address) {
                    $candidates = Profile::where('address', 'LIKE', '%' . $address . '%')->paginate(18);
                }

                if ($race) {
                    $candidates = Profile::where('race', $race)->paginate(18);
                }

                if ($dealer_experience) {
                    $candidates = Profile::where('dealer_experience', $dealer_experience)->paginate(18);
                }

                if(!count($candidates))
                {
                    $candidates = Profile::where('group_id', '!=', $group_id)
                    ->where('profile_status', 1)->paginate(18);                    
                }

                

                return $candidates;
            } else {
                $candidates = Profile::paginate(18);
                return $candidates;
            }
        }
    }

    function recent()
    {
        return Profile::latest()->take(10)->get();
    }

    function approved()
    {
        return Profile::where("status", "active")->get();
    }
    function suspended()
    {
        return Profile::where("status", "suspended")->get();
    }
    function pending()
    {
        return Profile::where("status", "pending")->get();
    }
    function find($id)
    {
        return Profile::find($id);
    }
    function countActive()
    {
        return Profile::where("status","active")->count();
    }
    function countSuspended()
    {
        return Profile::where("status","suspended")->count();
    }
    function countRejeted()
    {
        return Profile::where("status","rejected")->count();
    }
    function countPending()
    {
        return Profile::where("status","pending")->count();
    }
    function approve($id)
    {
        $profile = Profile::find($id);
        $profile->status = "active";
        $profile->update();
        return back()->with('success', 'Candidate activated successfully');
    }
    function suspend($id)
    {
        $profile = Profile::find($id);
        $profile->status = "suspended";
        $profile->update();
        return back()->with('success', 'Candidate suspended successfully');
    }
    function reject($id)
    {
        $profile = Profile::find($id);
        $profile->status = "rejected";
        $profile->update();
        return back()->with('success', 'Candidate rejected successfully');
    }
}
