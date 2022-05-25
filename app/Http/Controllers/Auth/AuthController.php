<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Preference;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'dob' => ['required'],
            'gender' => ['required'],
            'annual_income' => ['required'],
            'occupation' => ['required'],
            'family_type' => ['required'],
            'manglik' => ['required'],
            'expected_income' => ['required'],
            'multi_occupation' => ['required'],
            'multi_family_type' => ['required'],
            'multi_manglik' => ['required'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'gender' => $request->gender,
            'annual_income' => $request->annual_income,
            'occupation' => $request->occupation,
            'family_type' => $request->family_type,
            'manglik' => $request->manglik,
        ]);
        
        $expected_income = $request->expected_income;
        $multi_occupation = $request->multi_occupation;
        $multi_family_type = $request->multi_family_type;
        $multi_manglik = $request->multi_manglik;

        $preferences = Preference::create([
            'user_id' => $user->id,
            'expected_income' => $expected_income,
            'multi_occupation' => $multi_occupation,
            'multi_family_type' => $multi_family_type,
            'multi_manglik' => $multi_manglik,
        ]);

        return back()->with('success', 'You have register successfully');
    }

    public function loginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password not matches');
            }
        } else {
            return back()->with('fail', 'Email address is not register');
        }
    }

    public function dashboard(Request $request)
    {

        if ($request->session()->has('loginId')) {
            $data = User::with('prefrences')->where('id', $request->session()->get('loginId'))->first();
        }

        $preferenceArray = Preference::where('user_id', $data->id)->get();

        $user_id = $preferenceArray[0]['user_id'];
        $multi_occupation = $preferenceArray[0]['multi_occupation'];
        $multi_family_type = $preferenceArray[0]['multi_family_type'];
        $multi_manglik = $preferenceArray[0]['multi_manglik'];

        $suggestion = User::where('id', '!=', $user_id)->whereIn('occupation', $multi_occupation)
            ->whereIn('family_type', $multi_family_type)
            ->whereIn('manglik', $multi_manglik)->get();

        return view('dashboard', compact('data', 'multi_occupation', 'multi_family_type', 'multi_manglik', 'suggestion'));
    }

    public function logout(Request $request)
    {
        if ($request->session()->has('loginId')) {
            $request->session()->forget('loginId');
            $request->session()->flush();
            return redirect('login');
        }
    }
}
