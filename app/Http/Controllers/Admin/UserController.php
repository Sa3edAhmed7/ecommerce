<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Utils\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Hash;
use Image;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.users.create',compact('users'));
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
            'name' => 'required|unique:users|max:255',
            'email.required' =>'Please Enter The Email',
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2848|unique:users,image',
            'password.required' =>'Please Enter The Password',
            'password_confirmation.required' =>'Please Enter The Re-Password',
            'type.required' =>'Please Enter The Type',  
        ],[
            'name.required' =>'Please Enter The UserName',
            'name.unique' =>'Pre-Registered UserName',
            'email.required' =>'Please Enter The Email',
            'password.required' =>'Please Enter The Password',
            'password_confirmation.required' =>'Please Enter The Re-Password',
            'type.required' =>'Please Enter The Type',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' =>  ImageUpload::uploadImage($request->image , null , null , 'user/'),
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make($request->password_confirmation),
            'type' => $request->type,

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
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
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
            'name' => 'required|max:255',
            'email.required' =>'Please Enter The Email',
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2848|unique:users,image',
            'password.required' =>'Please Enter The Password',
            'password_confirmation.required' =>'Please Enter The Re-Password',
            'type.required' =>'Please Enter The Type',  
        ],[
            'name.required' =>'Please Enter The UserName',
            'email.required' =>'Please Enter The Email',
            'password.required' =>'Please Enter The Password',
            'password_confirmation.required' =>'Please Enter The Re-Password',
            'type.required' =>'Please Enter The Type',
        ]);
        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' =>  ImageUpload::uploadImage($request->image , null , null , 'user/'),
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make($request->password_confirmation),
            'type' => $request->type,
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
        User::find($id)->delete();
        return back()->with(session()->flash('delete', 'Delete Successfully'));
    }
}
