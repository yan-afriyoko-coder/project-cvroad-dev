<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealerRegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dealership;
use App\Repositories\Interfaces\IDealershipRepo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DealerRegisterController extends Controller
{
    private $dealer_repo;

    function __construct(IDealershipRepo $dealer_repo)
    {
        $this->dealer_repo = $dealer_repo;
    }

    public function dealerRegister(DealerRegisterRequest $request)
    {
        $results = $this->dealer_repo->register($request);
        return $results;
    }
}
