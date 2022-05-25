<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function adminLoginCheck(Request $request){
       
        $request->validate([
            'email'=>'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email','=',$request->email)->first();
        
        if($admin){
            
            if(Hash::check($request->password,$admin->password)){
                $request->session()->put('adminLoginId',$admin->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail','Password not matches');
            }
        }else{
            return back()->with('fail','Email address is not register');
        }
    }

    public function dashboard(Request $request){
        
        if($request->session()->has('adminLoginId')){
            $adminData = Admin::where('id',$request->session()->get('adminLoginId'))->first();
            $userData = User::get();       
        }
        
        return view('admin.dashboard',compact('adminData','userData'));
    }

    public function logout(Request $request){
        if($request->session()->has('adminLoginId')){
            $request->session()->forget('adminLoginId');
            $request->session()->flush();
            return redirect('/admin/login');
        }
    }
}
