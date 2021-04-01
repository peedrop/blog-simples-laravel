<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function postsBlog() {
        return $this->hasMany(PostBlog::class, 'category_id');
    }

    public function qntPostsBlog() {
        return $this->postsBlog()->count();
    }

    public static function allOrderByQntPosts() {
        return CategoryBlog::all()->sortByDesc(function ($category) {
            return $category->qntPostsBlog();
        });
    }
}
