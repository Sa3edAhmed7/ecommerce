<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Hash;
use Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $images = ImageProduct::all();
        return view('admin.images.index',compact('products','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.images.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2848|unique:image_products,image',
        ]);
        $image = uniqid() . '_' . time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('productimg/'. $request->product_id), $image);
        
        ImageProduct::create([
            'product_id' => $request->product_id,
            'image' =>'productimg/'. $request->product_id.'/'.$image,
            
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
        $images = ImageProduct::find($id);
        $products = Product::all();
        return view('admin.images.edit', compact('images','products'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
            $image = ImageProduct::find($id);
    
            unlink(public_path($image->image));
            ImageProduct::where("id", $image->id)->delete();
    
            return back()->with(session()->flash('delete', 'Delete Successfully'));
    
    }
}