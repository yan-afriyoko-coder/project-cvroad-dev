<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dealership;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Group; // Assuming you have a Group model
use App\Models\User; // Assuming you have a User model

class DealerRegisterController extends Controller
{
    public function createMoreInformation(Request $request)
    {
        return view('auth.dealer-register');
    }

    public function postMoreInformation(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'identification_number' => ['required', 'string'],
            ],
            [
                'name.required' => 'Name is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Invalid email format.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters long.',
                'password.confirmed' => 'Password confirmation does not match.',
                'identification_number.required' => 'ID Number is required.',
            ]
        );

        $request->session()->put('step1_data', $validatedData);

        return redirect()->route('dealer.additional.information');
    }

    public function createMoreInformation2(Request $request)
    {
        return view('auth.dealer-register2');
    }

    public function postMoreInformation2(Request $request)
    {
        $validatedData = $request->validate([
            'dname' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'province' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'website' => ['string', 'max:255'],
            'logo' => ['file', 'max:2048', 'image'],
            'cover_photo' => ['file', 'max:2048', 'image'],
            'slogan' => ['string', 'max:255'],
            'group_id' => ['required', 'integer', 'max:255'],
            'brand_id' => ['nullable','integer', 'max:255'],
            'description' => ['string', 'max:255'],
        ]);
        $user = User::create([
            'name' => $request->session()->get('step1_data')['name'],
            'email' => $request->session()->get('step1_data')['email'],
            'password' => Hash::make($request->session()->get('step1_data')['password']),
            'user_type' => 'employer',
        ]);

        $user->assignRole(Role::where('name', 'employer')->first());

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->storeAs('public/logo', 'logo_' . $user->id . '.' . $request->file('logo')->extension());
        }

        $cover_photoPath = null;
        if ($request->hasFile('cover_photo')) {
            $cover_photoPath = $request->file('cover_photo')->storeAs('public/cover_photo', 'cover_photo_' . $user->id . '.' . $request->file('cover_photo')->extension());
        }

        Dealership::create([
            'user_id' => $user->id,
            'dname' => $validatedData['dname'],
            'slug' => $validatedData['slug'],
            'address' => $validatedData['address'],
            'province' => $validatedData['province'],
            'phone' => $validatedData['phone'],
            'website' => $validatedData['website'],
            'logo' => $logoPath,
            'cover_photo' => $cover_photoPath,
            'slogan' => $validatedData['slogan'],
            'group_id' => $validatedData['group_id'],
            'brand_id' => $validatedData['brand_id'] ?? null,
            'description' => $validatedData['description'],
        ]);

        $request->session()->forget('step1_data');

        return redirect()->route('login')->with('success', 'Registration successful! Please login to continue.');
    }
}
