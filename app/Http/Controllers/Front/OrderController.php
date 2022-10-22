<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $data = Order::where('user_id',Auth::id())->get();
        return view('front.orders.index',['orders'=>$data],compact('pages'));
    }


    public function show($id)
    {
        $pages = Page::all();
        $data = Order::find($id);
        $orderproducts = OrderProduct::where('order_id',$id)->get();
        return view('front.orders.orderdetail',['order'=>$data ,'orderproducts' =>$orderproducts],compact('pages'));
    }
}
