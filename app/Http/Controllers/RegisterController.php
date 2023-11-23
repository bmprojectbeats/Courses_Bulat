<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
         $user_info = $request->all();
         User::create([
             "name"=>$user_info["name"],
             "email"=>$user_info["email"],
             "password"=>$user_info["password"],
         ]);
 
         return redirect("/")->with([
             "alert" => "Заявка отправлена!!"
         ]);
     }
}
