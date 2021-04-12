<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'headline',
        'contents',
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

    public static function saveImg($data, $name, $diretorio, $imgAntiga = '') {
        if(isset($data[$name]) && is_file($data[$name])){
            $imgName = $data[$name]->getClientOriginalName();
            $imgName = hash('sha256', $imgName . strval(time())) . '.' . $data[$name]->getClientOriginalExtension();
            PostBlog::deleteImg($imgAntiga, $diretorio);
            $data[$name]->storeAs($diretorio, $imgName);
            $data[$name] = $imgName;
        }else{
            unset($data[$name]);
        }

        return $data;
    }
    public static function deleteImg($imgName, $diretorio) {
        if($imgName != '' && $imgName != 'post_default.png'){
            Storage::delete($diretorio . $imgName);
        }
    }
}
