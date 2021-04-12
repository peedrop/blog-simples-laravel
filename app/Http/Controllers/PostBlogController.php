<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use App\Models\PostBlog;
use Illuminate\Http\Request;

class PostBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostBlog::all();
        return view('admin.blog.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new PostBlog();
        $categories = CategoryBlog::all();
        return view('admin.blog.posts.create',compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
        // $data = $request->validated();
        PostBlog::create($data);
        return redirect()->route('blog.posts.index')->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostBlog  $post
     * @return \Illuminate\Http\Response
     */
    public function show(PostBlog $post)
    {
        return view('admin.blog.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostBlog  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(PostBlog $post)
    {
        $categories = CategoryBlog::all();
        return view('admin.blog.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostBlog  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostBlog $post)
    {
        $data = $request->all();
        // $data = $request->validated();
        $post->update($data);
        return redirect()->route('blog.posts.index')->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostBlog  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostBlog $post)
    {
        $post->delete();
        return redirect()->route('blog.posts.index')->with('success',true);
    }
}
