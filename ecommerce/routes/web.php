<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Darryldecode\Cart\Cart;


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
Route::get('/dashboard',[SuperAdminController::class, 'dashboard']);
Route::post('//admin-dashboard',[AdminController::class, 'show_dashboard']);
Route::get('/logout',[SuperAdminController::class, 'logout']);

//Category Routes
Route::resource('/categories',CategoryController::class);
Route::get('/cat-status{category}',[CategoryController::class, 'change_status']);
// Route::post("/category/{id}/edit",[CategoryController::class,"update_product"]);

//Sub-Category Routes
Route::resource('/sub-categories',SubCategoryController::class);
Route::get('/subcat-status{subcategory}',[SubCategoryController::class, 'change_status']);

//Brand Routes
Route::resource('/brands',BrandController::class);
Route::get('/brand-status{brand}',[BrandController::class, 'change_status']);

//Unit Routes
Route::resource('/units',UnitController::class);
Route::get('/unit-status{unit}',[UnitController::class, 'change_status']);

//Size Routes
Route::resource('/sizes',SizeController::class);
Route::get('/size-status{size}',[SizeController::class, 'change_status']);

//Color Routes
Route::resource('/colors',ColorController::class);
Route::get('/color-status{color}',[ColorController::class, 'change_status']);

//Products Routes
Route::resource('/products',ProductController::class);
Route::get('/product-status{product}',[ProductController::class, 'change_status']);


// Frontend route
Route::get('/', function () {
    return view('frontend.welcome');
});


Route::get('/',[HomeController::class, 'index']);
Route::get('/view_details{id}',[HomeController::class, 'view_details']);
Route::get('/product_by_cat{id}',[HomeController::class, 'product_by_cat']);
Route::get('/product_by_subcat{id}',[HomeController::class, 'product_by_subcat']);
Route::get('/product_by_brand{id}',[HomeController::class, 'product_by_brand']);


//Cart Routes
Route::post('/add-to-cart',[CartController::class, 'add_to_cart']);
