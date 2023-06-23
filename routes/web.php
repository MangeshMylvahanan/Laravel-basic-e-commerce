<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
//login & logout
Route::view('/login',('Auth.login'))->middleware('guest')->name('login');
Route::get('login/google',[UserController::class,'GoogleRedirect']);
Route::get('login/google/callback',[UserController::class,'LoginWithGoogle']);
Route::get('/logout',[UserController::class,'logout']);

//products add
Route::get('products-add',[ProductsController::class,'index']);
Route::post('/store',[ProductsController::class,'productsadd']);
Route::get('/',[ProductsController::class,'home']);
//shop page
Route::get('/shop',[ProductsController::class,'shop']);
//detail page
Route::get('detail/{id}',[ProductsController::class,'detail']);
//cart
Route::post('/add_to_cart',[CartController::class,'addtocart'])->middleware('auth');
Route::get('/cartlist',[CartController::class,'CartList']);
Route::get('/removecart/{id}',[CartController::class,'removeCart']);
//buynow
Route::get('/buynow',[CartController::class,'BuyNow']);
Route::post('/payment',[PaymentController::class,'trial']);