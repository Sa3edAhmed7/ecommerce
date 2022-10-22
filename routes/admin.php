<?php
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailsController;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

const pagination_count = '3';

Route::get('/home', [HomeController::class,'index'])->name('admin')->middleware('verified');
Route::resource('categories', CategoryController::class);
Route::resource('page', PageController::class);
Route::resource('products', ProductController::class);
Route::resource('colors', ColorController::class);
Route::resource('productimages', ImageController::class);
Route::resource('settings', SettingController::class);
Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);
Route::get('orderdetail/{id}', [OrderDetailsController::class ,'index']);
Route::get('/{page}',[AdminController::class,'index']);
