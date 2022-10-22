<?php
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\SendMail;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\StoreController;
use App\Http\Controllers\Front\HeaderController;
use App\Http\Controllers\Front\MessageController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Front\ProductfController;
use App\Http\Controllers\Front\DashboardController;
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
Route::resource('dashboard', DashboardController::class)->middleware('CheckUser');
Route::get('/', [HomePageController::class,'index'])->name('index')->middleware('verified');
Route::resource('editprofile', UserController::class);
Route::resource('showpage', HeaderController::class);
Route::resource('contact-us', MessageController::class);
Route::get('send-mail', [SendMail::class,'SendMail']);
Route::get('/productdetail/{id}', [ProductfController::class ,'index']);
Route::get('search', [ProductfController::class ,'search']);
Route::resource('allproducts', StoreController::class);
Route::resource('order', OrderController::class);
Route::get('/orderdetails/{id}', [OrderController::class ,'show']);
Route::post('/add-to-cart',[CartController::class,'add_to_cart']);
Route::get('carts',[CartController::class,'mycart']);
Route::get('/delete-cart/{id}',[CartController::class,'delete']);
Route::get('/decreaseQuantity-cart/{id}',[CartController::class,'decreaseQuantity']);
Route::get('/increaseQuantity-cart/{id}',[CartController::class,'increaseQuantity']);
Route::resource('cart', CartController::class);
Route::resource('checkout', CheckOutController::class);
Auth::routes(['verify'=>true]);
Route::get('/{page}',[AdminController::class,'index']);

