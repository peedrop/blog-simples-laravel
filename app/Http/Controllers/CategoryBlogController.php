<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryBlogCreateRequest;
use App\Http\Requests\CategoryBlogUpdateRequest;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(CategoryBlog::class, 'categoryBlog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryBlog::all();
        return view('admin.blog.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new CategoryBlog();
        return view('admin.blog.categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryBlogCreateRequest $request)
    {
        $data = $request->validated();
        CategoryBlog::create($data);
        return redirect()->route('blog.categories.index')->with('success',true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryBlog  $category
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryBlog $category)
    {
        return view('admin.blog.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryBlog  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBlog $category)
    {
        return view('admin.blog.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryBlog  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryBlogUpdateRequest $request, CategoryBlog $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('blog.categories.index')->with('success',true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryBlog  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryBlog $category)
    {
        $category->delete();
        return redirect()->route('blog.categories.index')->with('success',true);
    }
}
