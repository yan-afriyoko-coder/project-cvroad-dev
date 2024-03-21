<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dealership;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DealerRegisterRequest;
use Illuminate\Contracts\Support\ValidatedData;
use App\Repositories\Interfaces\IDealershipRepo;

class DealerRegisterController extends Controller
{
    private $dealer_repo;

    function __construct(IDealershipRepo $dealer_repo)
    {
        $this->dealer_repo = $dealer_repo;
    }

    public function dealerRegister(DealerRegisterRequest $request)
    {
        // Validasi input
        $validatedData = $request->validated([
            'dname' => ['required', 'string', 'max:255'],
            'group_id' => ['required', 'exists:groups,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        // Cari peran (role) 'employer'
        $role = Role::where('name', 'employer')->firstOrFail();
    
        // Buat user baru
        $newUser = User::create([
            'name' => $request->input('dname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => 'employer'
        ]);

        // Berikan peran (role) 'employer' kepada user baru
        $newUser->assignRole($role);
    
        // Bersihkan data sesi 'user'
        $request->session()->forget('user');
    
        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registration successful! Please login to continue.');
    }
}
