<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ColorProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $colors = ColorProduct::all();
        return view('admin.colors.index',compact('products','colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.colors.create',compact('products'));
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
            'product_id.required' =>'Please Enter The Name Of The Product',
            'color.required' =>'Please Enter The Color',
            'name.required' =>'Please Enter The Color Name',
        ],[
            'product_id.required' =>'Please Enter The Name Of The Product',
            'color.required' =>'Please Enter The Color',
            'name.required' =>'Please Enter The Color Name',          
        ]);
        ColorProduct::create([
                'product_id' => $request->product_id,
                'color' => $request->color,
                'name' => $request->name,           
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
        $colors = ColorProduct::find($id);
        $products = Product::all();
        return view('admin.colors.edit', compact('colors','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id.required' =>'Please Enter The Name Of The Product',
            'color.required' =>'Please Enter The Color',
            'name.required' =>'Please Enter The Color Name',
        ],[
            'product_id.required' =>'Please Enter The Name Of The Product',
            'color.required' =>'Please Enter The Color',
            'name.required' =>'Please Enter The Color Name',          
        ]);
        $colors = ColorProduct::findOrFail($id);
        $colors->update([
            'color' => $request->color,
            'name' => $request->name,      
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
        ColorProduct::find($id)->delete();
        return back()->with(session()->flash('delete', 'Delete Successfully'));
    }

    public function deleteAll()
    {
        DB::table('color_products')->truncate();
        session()->flash('delete','Delete All Successfully');
        return redirect('colors');
    }
}
