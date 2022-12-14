<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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



//backend routes

Route::get('/admins',[AdminController::class, 'index']);
Route::get('/dashboard',[AdminController::class, 'dashboard']);
Route::post('//admin-dashboard',[AdminController::class, 'show_dashboard']);



// Frontend route
Route::get('/', function () {
    return view('frontend.welcome');
});


Route::get('/',[HomeController::class, 'index']);