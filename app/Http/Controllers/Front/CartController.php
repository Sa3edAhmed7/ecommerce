<?php

namespace App\Http\Controllers\Front;

use Cart;
use App\Models\Page;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ColorProduct;
use App\Models\OrderProduct;
use App\Models\Shoppingcart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_to_cart(Request $request) {   
        $quantity = $request->quantity;
        $id = $request->id;
        $users = User::where('id',Auth::id())->first();
        $products = Product::where('id',$id)->first();
        $data['user_id'] = $users->id;
        $data['id'] = $products->id;
        $data['name'] = $products->name;
        $data['price'] = $products->price;
        $data['quantity'] = $quantity;
        $data['offer'] = $products->offer;
        $data['product_id'] = $request->product_id;
        $colors = ColorProduct::where('product_id',$id)->first();
        $data['color_id'] = $colors['id'];
        $data['attributes'] = [$products->image];
        
        Cart::add($data);

        // $data = $request->all();
        // Shoppingcart::create($data);
        cardArray();

        return redirect()->back();
    }


    public function delete($id) {
       Cart::remove($id);
       return redirect()->back();
    }

    public function increaseQuantity($id){
        $data = Cart::get($id);
        $quantity = $data->quantity + 1;
        Cart::update($id,$quantity);
    }


    public function decreaseQuantity($id){
        $data = Cart::get($id);
        $quantity = $data->quantity - 1;
        Cart::update($id,$quantity);
    }

    public function store(Request $request){
        $data = $request->all();
        Shoppingcart::create($data);
        return redirect()->back();
    }
    public function index() {
        $product = Product::all();
        $colors = ColorProduct::where('product_id',Auth::id())->get();
        $carts = Shoppingcart::where('user_id',Auth::id())->get();
        $pages = Page::all();
        return view('front.wishlist',compact('pages','carts','product','colors'));
    }


    public function mycart(){
        $pages = Page::all();
        $colors = ColorProduct::where('product_id',Auth::id())->get();
        return view('front.cart',compact('pages','colors'));
    }
}
