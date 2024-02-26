<?php

namespace App\Repositories\Classes;

use App\Models\Dealership;
use App\Repositories\Interfaces\IGroupRepo;
use App\Models\Group;

class GroupRepo implements IGroupRepo
{
    /**
     * all groups
     */
    function all()
    {
        return Group::all();
    }

    /**
     * create 
     */
    function create($request)
    {
        Group::create($request->all());
        return back()->with('success', 'Group created successfully');
    }

    /**
     * find 
     */
    function find($id)
    {
        return Group::find($id);
    }

    /**
     * update
     */
    function update($request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->update();
        return back()->with('success', "group updated successfully");
    }

    function addDealer($group_id, $dealer_id)
    {
        $group = Group::find($group_id);
        $dealership = Dealership::find($dealer_id);
        $dealership->group()->associate($group);
        $dealership->update();
        return back()->with('success', 'Dealer added successfully');
    }
    function removeDealer($dealer_id)
    {
        $dealership = Dealership::find($dealer_id);
        $dealership->group()->disassociate();
        $dealership->update();
        return back()->with('success', 'Dealership removed successfully');
    }
}
