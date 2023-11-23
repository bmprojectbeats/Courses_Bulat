<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    function signin(){
        return view('login');
    }
    function signup(){
        return view('register');
    }
    function signin_valid(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = $request->only("email", "password");
        if(Auth::attempt([
            "email" => $user["email"],
            "password" => $user["password"]
        ])){
            return redirect("/")->with("success", "");
        }
        else{
            return redirect()->back()->with("error", "Неверный логин или пароль!!");
        }
        
    }
    function signup_valid(Request $request){
        $request->validate([
            "email" => "required|unique:user|email",
            "name" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password"
        ]);
        $userInfo = $request->all();
       $user_create = User::create([
            "email"=>$userInfo["email"],
            "name"=>$userInfo["name"],
            "password"=> Hash::make($userInfo["password"]),
        ]);
        if($user_create){
            return redirect("/login")->with("success", "");
        }
        else{
            return redirect()->back()->with("error", "Данные плохи");
        }
    }
    function signout(){
        Session::flush();
        Auth::logout();
        return redirect("/");
    }
}
