<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function profile(User $user){
     
        if(!$user){
            return $this->errorResponse();
        }

        return response()->json([
            'data' => $user
        ],200);
    }

    public function errorResponse(){
        return response()->json([
            'error' => "Profile not found!!"
        ],404);
    }


}
