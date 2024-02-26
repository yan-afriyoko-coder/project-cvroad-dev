<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dealership;
use Hash;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{



    public function disclaimer()
    {

        return view('about.disclaimer');
    }

    public function privacy()
    {

        return view('about.privacy');
    }

    public function conditions()
    {

        return view('about.terms');
    }

    public function home()
    {
        return view('index');
    }
}
