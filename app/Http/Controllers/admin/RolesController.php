<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            $roles = Role::all();
            return view('admin.roles.index', compact('roles'));
        }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|unique:roles,name',
    ]);

    // Create a new role
    $role = new Role();
    $role->name = $request->name;
    $role->save(); 

    return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::findOrFail($id);

        return view('admin.roles.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::findOrFail($id);

        return view('admin.roles.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $request->validate([
        'name' => 'required|unique:roles,name,' . $id,
    ]);

    $role = Role::findOrFail($id);

    $role->name = $request->name;
    $role->save();

    return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          Role::findOrFail($id)->delete();
 
          return redirect()->route('admin.roles.index')->with('success', 'User deleted successfully.');
    }
}
