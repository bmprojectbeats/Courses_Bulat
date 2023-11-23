<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Course::all();
        return view("index",["categories"=>$categories]);
    }

    public function create(Request $request){

            $request->validate([
                "title"=>"required|string",

            ],[
                "title.required"=>"Не спеши",
                "title.string"=>"Только буквы",
            ]);
        $category_info = $request->all();
        Category::create([
        "title" => $category_info["title"],
        ]);
    }

    public function show_categories($id){
        $courses = Course::where("category_id", $id)->get();
        return view("courses", ["courses"=>$courses]);
    }
}
