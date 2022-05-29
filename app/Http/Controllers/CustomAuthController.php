<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }




    public function registerUser(Request $request){
        
        
        
        $request->validate([
            'username'=>'required|min:4|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|regex: /^\+[0-9]{9,15}$/',
            'password' => 'required|min:6|confirmed',
            //|regex: /^{\+}[0-9]{1,4}[0-9]{9}$/
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        $res = $user->save();

        if($res){
            return back()->with('success','You have registered successfuly');
        }else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }else {
                return back()->with('fail', 'Password does not match');
            }
        }else {
            return back()->with('fail', 'This email is not registered');
        }
    }



    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }


    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
