<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\CategoryBlog;
use App\Models\PostBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function contato()
    {
        return view('site.contato');
    }

    public function sendMail(Request $request) {
        Mail::send(new Contact($request->all()));
        return redirect()->back()->with('success',true);
    }

    public function blog()
    {
        $categories = CategoryBlog::allOrderByQntPosts()->chunk(3)[0];
        $categories_all = CategoryBlog::all();
        $months = PostBlog::getLastMonths();
        $posts = PostBlog::paginate(4);
        $postsRecent = PostBlog::orderBy('id','desc')->take(3)->get();
        return view('site.blog', compact('categories', 'categories_all', 'months', 'postsRecent', 'posts'));
    }

    public function searchBlog(Request $request)
    {
        $search = $request->input('search');
        $posts = PostBlog::search($search)->paginate(4);
        $categories = CategoryBlog::allOrderByQntPosts()->chunk(3)[0];
        $categories_all = CategoryBlog::all();
        $months = PostBlog::getLastMonths();
        $postsRecent = PostBlog::orderBy('id','desc')->take(3)->get();
        return view('site.blog', compact('categories', 'categories_all', 'months', 'postsRecent', 'posts'));
    }

    public function searchCategoryBlog(CategoryBlog $category)
    {
        $posts = $category->postsBlog()->paginate(4);
        $categories = CategoryBlog::allOrderByQntPosts()->chunk(3)[0];
        $categories_all = CategoryBlog::all();
        $months = PostBlog::getLastMonths();
        $postsRecent = PostBlog::orderBy('id','desc')->take(3)->get();
        return view('site.blog', compact('categories', 'categories_all', 'months', 'postsRecent', 'posts'));
    }

    public function searchMonthBlog($month)
    {
        $posts = PostBlog::whereMonth('updated_at', '=', $month)->paginate(4);
        $categories = CategoryBlog::allOrderByQntPosts()->chunk(3)[0];
        $categories_all = CategoryBlog::all();
        $months = PostBlog::getLastMonths();
        $postsRecent = PostBlog::orderBy('id','desc')->take(3)->get();
        return view('site.blog', compact('categories', 'categories_all', 'months', 'postsRecent', 'posts'));
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
