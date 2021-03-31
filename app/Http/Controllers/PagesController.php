<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('site.home');
    }
    public function blog()
    {
        $categories = CategoryBlog::all();
        return view('site.blog', compact('categories'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
