<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use App\Models\PostBlog;
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
        $categories = CategoryBlog::allOrderByQntPosts()->chunk(3)[0];
        $posts = PostBlog::all();
        return view('site.blog', compact('categories', 'posts'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
