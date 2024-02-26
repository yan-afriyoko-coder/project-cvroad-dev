<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class CauseController extends Controller
{
    public function storecat() {
        $data = DB::table('categories')->get();
        return view('profile.index')->with('data', $data);
    }


    
    
    }

        