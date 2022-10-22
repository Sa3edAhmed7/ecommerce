<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() 
    {
        $pages = Page::all();
        return view('front.dashboard.dashboard',compact('pages'));
    }
}
