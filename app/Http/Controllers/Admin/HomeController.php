<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::all();
        $categorys = Category::all();
        $messages = Message::all();
        return view('admin.home',compact('users','products','categorys','messages'));
    }
}
