<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User
};
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return $errorString;
        }else{
            $user = User::create([
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'email' => $request->email,
            ]);
            $user->assignRole('user');
            $role = "user";

            if (Auth::attempt($request->only('email','password'))) {
                return redirect()->route('dashboardUser');
            }else{
                return redirect()->route('awal');
            }
        }
    }

    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->messages()->all());
            return $errorString;
        }else{
            if (Auth::attempt($request->only('email','password'))) {
                $user = User::where('email',$request->email)->first();
                $roles = $user->getRoleNames();
                if($roles[0] == 'admin'){
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->route('dashboardUser');
                }
            }else{
                return redirect()->route('awal');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('awal');
    }
}
