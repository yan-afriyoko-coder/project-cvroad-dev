<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Job;
use App\Repositories\Interfaces\ICandidateRepo;
use App\Repositories\Interfaces\IDealershipRepo;
use App\Repositories\Interfaces\IGroupRepo;

class DashboardController extends Controller
{
    private $dealer_repo;
    private $candidate_repo;
    private $group_repo;

    function __construct(IDealershipRepo $dealer_repo, ICandidateRepo $candidate_repo, IGroupRepo $group_repo)
    {
        $this->dealer_repo = $dealer_repo;
        $this->candidate_repo = $candidate_repo;
        $this->group_repo = $group_repo;
    }

    function dashboard()
    {
        // $active_count = $this->dealer_repo->countActive();
        // $pending_count = $this->dealer_repo->countApplications();
        // $suspended_count = $this->dealer_repo->countSuspended();
        // $profiles = $this->candidate_repo->recent();
        return view('admin.dashboard'
        // , compact('active_count', 'pending_count', 'suspended_count', 'profiles')
    );
    }

    function dealership()
    {
        $active_count = $this->dealer_repo->countActive();
        $pending_count = $this->dealer_repo->countApplications();
        $suspended_count = $this->dealer_repo->countSuspended();
        $profiles = $this->candidate_repo->recent();
        return view("admin.dealership.index",  compact('active_count', 'pending_count', 'suspended_count', 'profiles'));
    }

    function pendingDealers()
    {
        $dealerships = $this->dealer_repo->getPending();
        return view("admin.dealership.pending", compact('dealerships'));
    }

    function activeDealers()
    {
        $dealerships = $this->dealer_repo->getActive();
        return view("admin.dealership.active", compact('dealerships'));
    }

    function suspendedDealers()
    {
        $dealerships = $this->dealer_repo->getSuspended();
        return view("admin.dealership.suspended", compact('dealerships'));
    }

    function approveDealer($id)
    {
        $results = $this->dealer_repo->approve($id);
        return $results;
    }

    function rejectDealer($id)
    {
        $results = $this->dealer_repo->reject($id);
        return $results;
    }

    function suspendDealer($id)
    {
        $results = $this->dealer_repo->suspend($id);
        return $results;
    }

    function showDealer($id)
    {
        $dealership = $this->dealer_repo->find($id);
        return view("admin.dealership.show", compact("dealership"));
    }

    function showCandidate($id)
    {
        $profile = $this->candidate_repo->find($id);
        return view("admin.candidate.profile", compact('profile'));
    }

    function candidates()
    {
        $profiles = $this->candidate_repo->approved();
        $active_count = $this->candidate_repo->countActive();
        $rejected_count = $this->candidate_repo->countRejeted();
        $pending_count = $this->candidate_repo->countPending();
        $suspended_count = $this->candidate_repo->countSuspended();
        return view("admin.candidate.index", compact("profiles", "active_count", "rejected_count", "pending_count", "suspended_count"));
    }

    function pendingCandidates()
    {
        $profiles = $this->candidate_repo->pending();
        return view("admin.candidate.pending", compact("profiles"));
    }

    function suspendedCandidates()
    {
        $profiles = $this->candidate_repo->suspended();
        return view("admin.candidate.suspended", compact("profiles"));
    }

    function approveCandidate($id)
    {
        $results = $this->candidate_repo->approve($id);
        return $results;
    }

    function suspendCandidate($id)
    {
        $results = $this->candidate_repo->suspend($id);
        return $results;
    }

    function rejectCandidate($id)
    {
        $results = $this->candidate_repo->reject($id);
        return $results;
    }

    function groups()
    {
        $groups = $this->group_repo->all();
        return view("admin.group.index", compact('groups'));
    }

    function createGroup(GroupRequest $request)
    {
        $results = $this->group_repo->create($request);
        return $results;
    }

    function updateGroup(GroupRequest $request, $id)
    {
        $results = $this->group_repo->update($request, $id);
        return $results;
    }

    function showGroup($id)
    {
        $group = $this->group_repo->find($id);
        return view("admin.group.show", compact("group"));
    }

    function addDealer(Request $request, $id)
    {
        $results = $this->group_repo->addDealer($id, $request->dealership_id);
        return $results;
    }

    function removeDealer($id)
    {
        $results = $this->group_repo->removeDealer($id);
        return $results;
    }

    function axiosGetGroup($id)
    {
        $group = $this->group_repo->find($id);
        return response()->json([
            'group' => $group
        ]);
    }

    function axiosSearchDealer($search)
    {
        $dealerships = $this->dealer_repo->search($search);
        return response()->json([
            "dealerships" => $dealerships
        ]);
    }




    public function index()
    {
        $profiles = Profile::latest()->paginate(20);
        return view('admin.users.index', compact('profiles'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, []);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            Profile::where('id', $id)->update([
                'profile_status' => $request->get('profile_status')
            ]);
        }

        $this->updateAllExceptImage($request, $id);
        return redirect()->back()->with('message', 'Profile updated successfully');
    }

    public function destroy(Request $request)
    {

        $id = $request->get('id');
        $profile = Profile::find($id);
        $profile->delete();
        return redirect()->back()->with('message', 'Profile deleted successfully');
    }

    public function trash()
    {
        $profiles = Profile::onlyTrashed()->paginate(20);
        return view('admin.trash', compact('profiles'));
    }
    public function restore($id)
    {
        Profile::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Profile restored successfully');
    }

    public function toggle($id)
    {
        $profile = Profile::find($id);
        $profile->profile_status = !$profile->profile_status;
        $profile->save();
        return redirect()->back()->with('message', 'Status updated successfully');
    }


    public function toggle2($id)
    {
        $profile = Profile::find($id);
        $profile->dealer_experience = !$profile->dealer_experience;
        $profile->save();
        return redirect()->back()->with('message', 'Status updated successfully');
    }


    //public function search(Request $request){


    //  $status = $request->get('profile_status');

    //   if($status){

    //   $profiles =  Profile::

    //          Where('profile_status',$status)// this is orWhere

    //          ->paginate(1);

    //        return view('admin.index',compact('profiles'));

    //   }else{



    //    $profiles = Profile::latest()->paginate(2);

    //       return view('admin.index',compact('profiles'));


    //}

    //  }
}
