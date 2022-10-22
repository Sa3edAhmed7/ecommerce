<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::paginate(pagination_count);
        return view('admin.products.index',compact('category','product'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id.required' =>'Please Enter The Name Of The Category',
            'name.required' =>'Please Enter The Product Name',
            'price.required' =>'Please Enter The Price',
            'description.required' =>'Please Enter The Product Details',
            'offer.required' =>'Please Enter The Offer',
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2848|unique:products,image',
        ],[
            'category_id.required' =>'Please Enter The Name Of The Category',
            'name.required' =>'Please Enter The Product Name',
            'price.required' =>'Please Enter The Price',
            'description.required' =>'Please Enter The Product Details',
            'offer.required' =>'Please Enter The Offer',
        ]);
        Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'offer' => $request->offer,
                'image' =>  ImageUpload::uploadImage($request->image , null , null , 'product/'),
            ]);
            return back()->with(session()->flash('Add', 'Add Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.products.edit', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'category_id.required' =>'Please Enter The Name Of The Category',
            'name.required' =>'Please Enter The Product Name',
            'price.required' =>'Please Enter The Price',
            'description.required' =>'Please Enter The Product Details',
            'offer.required' =>'Please Enter The Offer',
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2848|unique:products,image',
        ],[
            'category_id.required' =>'Please Enter The Name Of The Category',
            'name.required' =>'Please Enter The Product Name',
            'price.required' =>'Please Enter The Price',
            'description.required' =>'Please Enter The Product Details',
            'offer.required' =>'Please Enter The Offer',
        ]);
        $products = Product::findOrFail($id);
        $products->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'offer' => $request->offer,
            'image' =>  ImageUpload::uploadImage($request->image , null , null , 'product/'),
        ]);
        return back()->with(session()->flash('edit', 'Edit Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back()->with(session()->flash('delete', 'Delete Successfully'));
    }

    public function deleteAll()
    {
        DB::table('products')->truncate();
        session()->flash('delete','تم حذف المنتجات بنجاح');
        return redirect('products');
    }
}
