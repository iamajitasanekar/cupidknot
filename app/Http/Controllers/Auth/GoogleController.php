<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;

class GoogleController extends Controller
{
    public function redirectToGoole(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallBack(){
        // $user = Socialite::driver('google')->user();

        // print_r($user); die;
    }
}
