<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::all();
        return view('admin.categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|unique:categories|max:255',
        ],[

            'name.required' =>'Name required',
            'name.unique' =>'Name pre-registered required',


        ]);

        Category::create([
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
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
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
        $name = $request->name;
        $this->validate($request, [

            'name' => 'required|max:255|unique:categories,name'
        ],[

            'name.required' =>'Please Enter The Category Name',
            'name.unique' =>'Department Name Pre-Registered',

        ]);
        $category = Category::find($id);
        $category->update([
            'name'=> $name, 
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
        $category = Category::find($id);
        $category->delete();
        return back()->with(session()->flash('delete', 'Delete Successfully'));
    }

    public function deleteAll()
    {
        DB::table('categories')->truncate();
        session()->flash('delete','تم حذف الأقسام بنجاح');
        return redirect('admin.categories.index');
    }
}
