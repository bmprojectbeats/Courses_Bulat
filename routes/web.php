<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [CourseController::class, "index"]);

Route::get('/login', [UserController::class, "signin"]);
Route::get('/register', [UserController::class, "signup"]);
Route::post('/signup_valid', [UserController::class, "signup_valid"]);
Route::post('/signin_valid', [UserController::class, "signin_valid"]);
Route::get("/signout", [UserController::class,"signout"]);

Route::post('/enroll', [ApplicationController::class, "new_application"]);
Route::get("/admin", [AdminController::class, "index"]);
Route::get("/application/{id_application}/confirm",[ApplicationController::class, "confirm"]);
Route::post("/course/create",[CourseController::class, "create"]);
Route::post("/category/create",[CategoryController::class, "create"]);
Route::post("/register",[RegisterController::class, "register"]);



Route::get('/lk', function(){
    return view('lk');
});
Route::get('/', [CourseController::class, "index"]);
