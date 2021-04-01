<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'headline',
        'content',
        'image_path',
        'user_id',
        'category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(CategoryBlog::class);
    }

    public function verifyEdit() {
        if($this->created_at == $this->updated_at)
            return "Postado";
        else
            return "Editado";
    }
}
