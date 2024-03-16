<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function update(Request $request, $id)
    {
        
            $request->validate([
                'name' => 'required',
            ]);
    
            $requestData = $request->all();
    
            $role = Role::findOrFail($id);
            $role->update($requestData);
            $role->syncPermissions($request->permission);
    
            if ($role) {
                return redirect()->route('roles.index')->with('success', 'Role Updated!!');
            }
    
            return redirect()->route('roles.index')->with('error', 'Role failed to update!');
        
    }}
    