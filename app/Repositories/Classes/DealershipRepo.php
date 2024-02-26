<?php

namespace App\Repositories\Classes;

use App\Repositories\Interfaces\IDealershipRepo;
use App\Models\Dealership;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DealershipRepo implements IDealershipRepo
{
    /**
     * Register
     */
    function register($request)
    {
        $user =  User::create([
            'name' => request('dname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
        ]);
        Dealership::create([
            'user_id' => $user->id,
            'dname' => request('dname'),
            'group_id' => request('group_id'),
            'slug' => Str::slug(request('dname'))

        ]);

        return redirect()->to('login');
    }
    /**
     * Get random dealerships
     */
    function random()
    {
        return Dealership::get()->random(0);
    }

    /**
     * Get all dealerships
     */
    function all()
    {
        return Dealership::all();
    }

    /**
     * Get my dealership
     */
    function myDealer()
    {
        $user_id = auth()->user()->id;
        return Dealership::where('user_id', $user_id)->first();
    }

    /**
     * Uppdate 
     */
    function update($request)
    {
        $user_id = auth()->user()->id;

        Dealership::where('user_id', $user_id)->update([
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'website' => $request->get('website'),
            'slogan' => $request->get('slogan'),
            'description' => $request->get('description'),

        ]);

        return redirect()->back()->with('message', 'Dealership Successfully Updated!');
    }

    /**
     * upload cover photo
     */
    function uploadCoverPhoto($request)
    {
        $user_id = auth()->user()->id;
        if ($request->hasfile('cover_photo')) {

            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/coverphoto/', $filename);
            Dealership::where('user_id', $user_id)->update([
                'cover_photo' => $filename

            ]);
            return redirect()->back()->with('message', 'Dealership Cover Photo Successfully Updated!');
        }

        return back()->withErrors(['error' => 'Cover photo not updated']);
    }

    /**
     * upload logo
     */
    function uploadLogo($request)
    {
        $user_id = auth()->user()->id;
        if ($request->hasfile('logo')) {

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/logo/', $filename);
            Dealership::where('user_id', $user_id)->update([
                'logo' => $filename

            ]);
            return redirect()->back()->with('message', 'Dealership Logo Photo Successfully Updated!');
        }

        return back()->withErrors(['error' => 'Logo photo not updated']);
    }

    function topDealers()
    {
        return Dealership::withCount('jobs') // Load job count for each dealer
            ->orderByDesc('jobs_count') // Order by the job count in descending order
            ->take(4) // Limit the result to the top 4 dealers
            ->get();
    }

    function find($id)
    {
        return Dealership::find($id);
    }

    function countActive()
    {
        return Dealership::where("status", "active")->count();
    }
    function countApplications()
    {
        return Dealership::where("status", "pending")->count();
    }
    function countSuspended()
    {
        return Dealership::where("status", "suspended")->count();
    }
    function getActive()
    {
        return Dealership::where('status', 'active')->get();
    }
    function getSuspended()
    {
        return Dealership::where('status', 'suspended')->get();
    }
    function getPending()
    {
        return Dealership::where('status', 'pending')->get();
    }
    function approve($id)
    {
        $dealership = Dealership::find($id);
        $dealership->status = "active";
        $dealership->update();
        return back()->with('success', 'Dealer activated successfully');
    }
    function reject($id)
    {
        $dealership = Dealership::find($id);
        $dealership->status = "rejected";
        $dealership->update();
        return back()->with('success', 'Dealer rejected successfully');
    }
    function suspend($id)
    {
        $dealership = Dealership::find($id);
        $dealership->status = "suspended";
        $dealership->update();
        return back()->with('success', 'Dealer suspended successfully');
    }

    function search($search)
    {
        $dealerships = Dealership::where("dname", 'LIKE', "%$search%")->get();
        return $dealerships;
    }
}
