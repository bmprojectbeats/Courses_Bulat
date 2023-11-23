<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function new_application(Request $request){
       $request->validate([
            "email"=>"required|email",
            "name"=>"required|max:50",
        ],[
            "email"=>"Не спеши",
            "email.email"=>"Ты фейк",
            "name.required"=>"Снова поспешил",
            "name.max"=>"Имя больше, чем ты",
        ]);

        $application_info = $request->all();
        Application::create([
            "email"=>$application_info["email"],
            "name"=>$application_info["name"],
            "course_id"=>$application_info["course"],
        ]);

        return redirect("/")->with([
            "alert" => "Заявка отправлена!!"
        ]);
    }
    public function confirm($id_application){
        $application = Application::find($id_application);
        $application->is_confirm = 1;
        $application->save();
        return redirect("/admin");
    }
}
