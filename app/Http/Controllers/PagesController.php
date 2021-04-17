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
        $categories_all = CategoryBlog::all();
        $posts = PostBlog::paginate(4);
        $months = PostBlog::getLastMonths();
        return view('site.blog', compact('categories', 'categories_all', 'posts', 'months'));
    }

    public function search(Request $request, CategoryBlog $category)
    {
        $search = $request->input('search');
        if($category->id)
            $posts = $category->postsBlog()->paginate(4);
        else
            $posts = PostBlog::search($search)->paginate(4);
        $categories = CategoryBlog::allOrderByQntPosts()->chunk(3)[0];
        $categories_all = CategoryBlog::all();
        $months = PostBlog::getLastMonths();
        return view('site.blog', compact('categories', 'categories_all', 'posts', 'months'));
    }

    public function post(PostBlog $post)
    {
        return view('site.post', compact('post'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
