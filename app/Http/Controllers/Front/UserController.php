<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Utils\ImageUpload;
use Illuminate\Support\Facades\Storage;
use Hash;
use Image;
class UserController extends Controller
{
    public function index()
    {
        return view('front.dashboard.edit');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email.required' =>'Please Enter The Email',
            'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2848|unique:users,image',
            'password.required' =>'Please Enter The Password',
            'password_confirmation.required' =>'Please Enter The Re-Password',
        ],[
            'name.required' =>'Please Enter The UserName',
            'email.required' =>'Please Enter The Email',
            'password.required' =>'Please Enter The Password',
            'password_confirmation.required' =>'Please Enter The Re-Password',
        ]);
        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' =>  ImageUpload::uploadImage($request->image , null , null , 'user/'),
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make($request->password_confirmation),
        ]);
        return back()->with(session()->flash('edit', 'Edit Successfully'));
    }

}
